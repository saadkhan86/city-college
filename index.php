<?php
session_start();
require_once "config/database.php";

$page = $_GET['page'] ?? 'login';

$pages = [
    'login' => 'pages/login.php',
    'signup' => 'pages/signup.php',
    'dashboard' => 'pages/dashboard.php',
    'profile' => 'pages/profile.php',
    'edit-profile' => 'pages/edit-profile.php',
    'about' => 'pages/about.php',
    'contact' => 'pages/contact.php'
];

if (!isset($pages[$page])) {
    $page = 'login';
}
$protectedPages = [
    'dashboard',
    'profile',
    'edit-profile',
    'about',
    'contact',
];

if (in_array($page, $protectedPages) && !isset($_SESSION['user'])) {
    header("Location: index.php?page=login");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>City College | <?php echo ucfirst($page); ?> </title>
    <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
    >
    <link rel="stylesheet" href="style/style.css">

    <?php if ($page == 'login' || $page == 'signup') { ?>
        <link rel="stylesheet" href="style/auth.css">
    <?php } ?>

    <?php if ($page == 'dashboard' || $page == 'about' || $page == 'contact' || $page == 'edit-profile') { ?>
        <link rel="stylesheet" href="style/dashboard.css">
    <?php } ?>

    <?php if ($page == 'contact') { ?>
        <link rel="stylesheet" href="style/contact.css">
    <?php } ?>

    <?php if ($page == 'profile' || $page == 'edit-profile') { ?>
        <link rel="stylesheet" href="style/profile.css">
    <?php } ?>

    <?php if ($page == 'contact') { ?>
        <link rel="stylesheet" href="style/contact.css">
    <?php } ?>

</head>

<body>

    <?php if ($page !== 'login' && $page !== 'signup') { ?>
        
        <?php include "includes/navbar.php"; ?>

    <?php } ?>


    <main>
        <?php include $pages[$page]; ?>
    </main>


    <?php if ($page !== 'login' && $page !== 'signup') { ?>

        <?php include "includes/footer.php"; ?>

    <?php } ?>

</body>

</html>