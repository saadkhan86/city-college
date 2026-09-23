<nav class="navbar">

    <div class="logo">

        <div class="logo-icon">
            CC
        </div>

        <div>
            <h2>City College</h2>
            <span>Student Portal</span>
        </div>

    </div>


    <div class="nav-links">

        <a href="index.php?page=dashboard">
            Home
        </a>

        <a href="index.php?page=about">
            About
        </a>

        <a href="index.php?page=contact">
            Contact Us
        </a>

    </div>


    <?php if (isset($_SESSION['user'])) { ?>

        <a
            href="index.php?page=profile"
            class="profile-btn"
            title="My Profile"
        >

            <i class="fa-solid fa-user"></i>

        </a>

    <?php } ?>

</nav>