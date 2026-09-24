<?php
$currentPage = $_GET['page'] ?? 'dashboard';
?>
<nav class="navbar">

    <div class="logo-icon">
        <a href="index.php?page=dashboard" title="City College Home">
            <img src="images/logo.png" alt="City College Logo" class="logo">
        </a>
    </div>

    <div class="nav-links">

        <a href="index.php?page=dashboard" class="<?php echo ($currentPage === 'dashboard') ? 'active' : ''; ?>">
            Home
        </a>

        <a href="index.php?page=contact" class="<?php echo ($currentPage === 'contact') ? 'active' : ''; ?>">
            Contact Us
        </a>

        <a href="index.php?page=about" class="<?php echo ($currentPage === 'about') ? 'active' : ''; ?>">
            About
        </a>

        

    </div>

    <?php if (isset($_SESSION['user'])) { ?>

        <a
            href="index.php?page=profile"
            class="profile-btn <?php echo ($currentPage === 'profile' || $currentPage === 'edit-profile') ? 'active' : ''; ?>"
            title="My Profile"
        >

            <i class="fa-solid fa-user"></i>

        </a>

    <?php } ?>

</nav>