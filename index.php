<?php

session_start();

require_once "config/database.php";

$isLoggedIn = isset($_SESSION['user']);

$page = $_GET['page'] ?? null;

if ($page === null) {

    if ($isLoggedIn) {

        $page = 'dashboard';

    } else {

        $page = 'login';
    }
}


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

    $page = $isLoggedIn
        ? 'dashboard'
        : 'login';
}


if (
    $isLoggedIn &&
    ($page === 'login' || $page === 'signup')
) {

    header("Location: index.php?page=dashboard");
    exit;
}


$protectedPages = [

    'dashboard',
    'profile',
    'edit-profile',
    'about',
    'contact'

];


if (
    in_array($page, $protectedPages) &&
    !$isLoggedIn
) {

    header("Location: index.php?page=login");
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>
        City College | <?php echo ucfirst($page); ?>
    </title>


    <!-- Font Awesome -->

    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
    >


    <!-- Common CSS -->

    <link
        rel="stylesheet"
        href="style/style.css"
    >


    <!-- Authentication CSS -->

    <?php if ($page === 'login' || $page === 'signup') { ?>

        <link
            rel="stylesheet"
            href="style/auth.css"
        >

    <?php } ?>


    <!-- Dashboard CSS -->

    <?php if (
        $page === 'dashboard' ||
        $page === 'about' ||
        $page === 'contact' ||
        $page === 'edit-profile'
    ) { ?>

        <link
            rel="stylesheet"
            href="style/dashboard.css"
        >

    <?php } ?>


    <!-- Profile CSS -->

    <?php if (
        $page === 'profile' ||
        $page === 'edit-profile'
    ) { ?>

        <link
            rel="stylesheet"
            href="style/profile.css"
        >

    <?php } ?>


    <!-- Contact CSS -->

    <?php if ($page === 'contact') { ?>

        <link
            rel="stylesheet"
            href="style/contact.css"
        >

    <?php } ?>
    
    <link rel="apple-touch-icon" sizes="180x180" href="assets/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="assets/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/favicon/favicon-16x16.png">
    <link rel="manifest" href="assets/favicon/site.webmanifest">
    <link rel="mask-icon" href="assets/favicon/safari-pinned-tab.svg" color="#5bbad5">

</head>


<body>


    <!-- Navbar -->

    <?php if (
        $page !== 'login' &&
        $page !== 'signup'
    ) { ?>

        <?php include "includes/navbar.php"; ?>

    <?php } ?>


    <!-- Page -->

    <main>

        <?php include $pages[$page]; ?>

    </main>


    <!-- Footer -->

    <?php if (
        $page !== 'login' &&
        $page !== 'signup'
    ) { ?>

        <?php include "includes/footer.php"; ?>

    <?php } ?>


</body>

</html>
