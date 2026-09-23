<?php
session_start();
header('Content-Type: application/json');

require_once "config/database.php";

if (!isset($_SESSION['user']) || !isset($_SESSION['user']['id'])) {
    http_response_code(401);
    echo json_encode(['success' => false, 'message' => 'Unauthorized. Please login again.']);
    exit;
}

$user_id = (int)$_SESSION['user']['id'];

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['success' => false, 'message' => 'Method not allowed.']);
    exit;
}

if (!isset($_FILES['avatar']) || $_FILES['avatar']['error'] !== UPLOAD_ERR_OK) {
    $errorCode = $_FILES['avatar']['error'] ?? 'unknown';
    echo json_encode(['success' => false, 'message' => 'Upload failed. Error code: ' . $errorCode]);
    exit;
}

$file = $_FILES['avatar'];

// Check size (Max 5MB)
$maxSize = 5 * 1024 * 1024;
if ($file['size'] > $maxSize) {
    echo json_encode(['success' => false, 'message' => 'Image size must be less than 5MB.']);
    exit;
}

// Validate genuine image
$imageInfo = @getimagesize($file['tmp_name']);
if ($imageInfo === false) {
    echo json_encode(['success' => false, 'message' => 'Selected file is not a valid image.']);
    exit;
}

$mime = $imageInfo['mime'];
$allowedMimes = [
    'image/jpeg' => 'jpg',
    'image/png'  => 'png',
    'image/webp' => 'webp',
    'image/gif'  => 'gif'
];

if (!array_key_exists($mime, $allowedMimes)) {
    echo json_encode(['success' => false, 'message' => 'Only JPG, PNG, WEBP, or GIF images are allowed.']);
    exit;
}

$ext = $allowedMimes[$mime];
$uploadDir = "uploads/avatars/";

if (!is_dir($uploadDir)) {
    if (!mkdir($uploadDir, 0777, true)) {
        echo json_encode(['success' => false, 'message' => 'Failed to create upload directory.']);
        exit;
    }
}

// Generate unique filename
$randomStr = bin2hex(random_bytes(6));
$newFilename = "avatar_{$user_id}_" . time() . "_{$randomStr}.{$ext}";
$destination = $uploadDir . $newFilename;

if (move_uploaded_file($file['tmp_name'], $destination)) {
    // Retrieve and remove old avatar if exists
    $oldQuery = "SELECT profile_image FROM students WHERE id = $user_id";
    $oldResult = mysqli_query($conn, $oldQuery);
    if ($oldResult && $oldRow = mysqli_fetch_assoc($oldResult)) {
        $oldFile = $oldRow['profile_image'];
        if (!empty($oldFile) && file_exists($oldFile) && strpos($oldFile, 'uploads/avatars/') === 0) {
            @unlink($oldFile);
        }
    }

    // Update database
    $escapedPath = mysqli_real_escape_string($conn, $destination);
    $updateQuery = "UPDATE students SET profile_image = '$escapedPath' WHERE id = $user_id";
    $updated = mysqli_query($conn, $updateQuery);

    if ($updated) {
        $_SESSION['user']['profile_image'] = $destination;
        echo json_encode([
            'success' => true,
            'image_url' => $destination,
            'message' => 'Profile picture updated successfully!'
        ]);
    } else {
        echo json_encode([
            'success' => false,
            'message' => 'Failed to update database record: ' . mysqli_error($conn)
        ]);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Failed to save the uploaded image.']);
}
exit;
