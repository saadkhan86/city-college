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

        <a href="index.php?page=profile" class="profile-btn">

            <div class="profile-avatar">
                <?php
                echo strtoupper(
                    substr($_SESSION['user']['full_name'], 0, 1)
                );
                ?>
            </div>

            <div class="profile-info">
                <strong>
                    <?php echo $_SESSION['user']['full_name']; ?>
                </strong>

                <span>My Profile</span>
            </div>

        </a>

    <?php } ?>

</nav>