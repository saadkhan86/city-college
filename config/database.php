<?php

$host = "localhost";
$username = "student_user";
$password = "student123";
$database = "student_db";

$conn = new mysqli(
    $host,
    $username,
    $password,
    $database
);

if ($conn->connect_error) {
    die("Database connection failed: " . $conn->connect_error);
}
?>