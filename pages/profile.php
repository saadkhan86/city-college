
<?php 
    if(isset($_SESSION['user'])){
        $user_id = $_SESSION['user']['id'];
        
    }    
    
?>
<!-- Main -->
    <main class="dashboard-container">
        <!-- Profile Header -->
        <section class="profile-header">

            <div class="large-avatar">
                AK
            </div>

            <div class="profile-header-info">

                <span class="profile-label">
                    STUDENT PROFILE
                </span>

                <h1>
                    Ali Khan
                </h1>

                <p>
                    Computer Science Student
                </p>

                <span class="student-id">
                    Student ID: CC-2026-00125
                </span>

            </div>

        </section>


        <!-- Profile Content -->
        <div class="profile-layout">


            <!-- Personal Information -->
            <div class="profile-card">

                <div class="profile-card-header">

                    <div>
                        <h2>Personal Information</h2>

                        <p>
                            Your basic personal details.
                        </p>
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
                            Ali Khan
                        </strong>

                    </div>


                    <div class="detail">

                        <span class="detail-label">
                            Email
                        </span>

                        <strong>
                            ali.khan@example.com
                        </strong>

                    </div>


                    <div class="detail">

                        <span class="detail-label">
                            Phone
                        </span>

                        <strong>
                            +92 300 1234567
                        </strong>

                    </div>


                    <div class="detail">

                        <span class="detail-label">
                            Date of Birth
                        </span>

                        <strong>
                            15 March 2004
                        </strong>

                    </div>


                    <div class="detail">

                        <span class="detail-label">
                            Gender
                        </span>

                        <strong>
                            Male
                        </strong>

                    </div>


                    <div class="detail">

                        <span class="detail-label">
                            City
                        </span>

                        <strong>
                            Multan, Pakistan
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

                        <p>
                            Your college information.
                        </p>
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

            <a href="dashboard.php" class="secondary-btn">
                ← Back to Dashboard
            </a>

            <a href="logout.php" class="logout-btn">
                Logout
            </a>

        </div>

    </main>

