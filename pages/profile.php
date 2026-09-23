
<?php 
    if(isset($_SESSION['user'])){
        $user_id = $_SESSION['user']['id'];
        $query = "SELECT * FROM students WHERE id = $user_id";
        $result = mysqli_query($conn, $query);
        $user = mysqli_fetch_assoc($result);
        $full_name = $user['full_name'];
        $email = $user['email'];
        $phone_number = $user['phone_number'];
        $dob = $user['dob'];
        $gender = $user['gender'];
        $address = $user['address'];
    }else{
        header("Location:index.php?page=login.php");
        exit;
    }    
    
?>
<!-- Main -->
    <main class="dashboard-container">
        <!-- Profile Header -->
        <section class="profile-header">

            <div class="large-avatar">
                <?php echo $full_name[0]; ?>
            </div>

        </section>


        <!-- Profile Content -->
        <div class="profile-layout">


            <!-- Personal Information -->
            <div class="profile-card">

                <div class="profile-card-header">

                    <div>
                        <h2>Personal Information</h2>
                    </div>

                    <span class="card-header-icon">
                        👤
                    </span>

                </div>

                <div class="profile-details">

                    <div class="detail">

                        <span class="detail-label">
                            Full Name
                        </span>

                        <strong>
                            <?php echo $full_name; ?>
                        </strong>

                    </div>


                    <div class="detail">

                        <span class="detail-label">
                            Email
                        </span>

                        <strong>
                            <?php echo $email; ?>
                        </strong>

                    </div>


                    <div class="detail">

                        <span class="detail-label">
                            Phone Number
                        </span>

                        <strong>
                            <?php echo $phone_number; ?>
                        </strong>

                    </div>


                    <div class="detail">

                        <span class="detail-label">
                            Date of Birth
                        </span>

                        <strong>
                            <?php echo $dob;?>
                        </strong>

                    </div>


                    <div class="detail">

                        <span class="detail-label">
                            Gender
                        </span>

                        <strong>
                            <?php echo $gender;?>
                        </strong>

                    </div>


                    <div class="detail">

                        <span class="detail-label">
                            City
                        </span>

                        <strong>
                            <?php echo $address;?>
                        </strong>

                    </div>
                    <div class="card-header-actions">

                        <a
                            href="index.php?page=edit-profile"
                            class="edit-btn"
                        >
                            ✏️ Edit
                        </a>
                    </div>

                </div>

            </div>


            <!-- Academic Information -->
            <div class="profile-card">

                <div class="profile-card-header">

                    <div>
                        <h2>Academic Information</h2>
                    </div>

                    <span class="card-header-icon">
                        🎓
                    </span>

                </div>


                <div class="profile-details">

                    <div class="detail">

                        <span class="detail-label">
                            Student ID
                        </span>

                        <strong>
                            CC-2026-00125
                        </strong>

                    </div>


                    <div class="detail">

                        <span class="detail-label">
                            Program
                        </span>

                        <strong>
                            Associate Degree in Computer Science
                        </strong>

                    </div>


                    <div class="detail">

                        <span class="detail-label">
                            Semester
                        </span>

                        <strong>
                            2nd Semester
                        </strong>

                    </div>


                    <div class="detail">

                        <span class="detail-label">
                            Department
                        </span>

                        <strong>
                            Computer Science
                        </strong>

                    </div>


                    <div class="detail">

                        <span class="detail-label">
                            Session
                        </span>

                        <strong>
                            2025 - 2027
                        </strong>

                    </div>


                    <div class="detail">

                        <span class="detail-label">
                            Status
                        </span>

                        <strong class="status">
                            Active
                        </strong>

                    </div>

                </div>

            </div>

        </div>


        <!-- Actions -->
        <div class="profile-actions">

            <a href="index.php?page=dashboard" class="secondary-btn">
                ← Back to Dashboard
            </a>

            <a href="logout.php" class="logout-btn">
                Logout
            </a>

        </div>

    </main>

