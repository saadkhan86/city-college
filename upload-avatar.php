<?php
session_start();
header('Content-Type: application/json');

require_once "config/database.php";

if (!isset($_SESSION['user']) || !isset($_SESSION['user']['id'])) {
    header("Location:index.php?page=login");
    exit;
}

$user_id = $_SESSION['user']['id'];

$file = $_FILES['avatar'];


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
    mkdir($uploadDir, 0777, true);
}

$newFilename = "avatar_{$user_id}_" . time() . ".{$ext}";
$destination = $uploadDir . $newFilename;

if (move_uploaded_file($file['tmp_name'], $destination)) {
    $oldQuery = "SELECT profile_image FROM students WHERE id = $user_id";
    $oldResult = mysqli_query($conn, $oldQuery);
    if ($oldResult && $oldRow = mysqli_fetch_assoc($oldResult)) {
        $oldFile = $oldRow['profile_image'];
        if (!empty($oldFile) && file_exists($oldFile) && $oldFile != "uploads/avatars/default.jpg") {
            @unlink($oldFile);
        }
    }

    $updateQuery = "UPDATE students SET profile_image = '$destination' WHERE id = $user_id";
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
