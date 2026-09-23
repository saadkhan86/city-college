
<?php 
    if(isset($_SESSION['user'])){
        $user_id = $_SESSION['user']['id'];
        $query = "SELECT * FROM students WHERE id = $user_id";
        $result = mysqli_query($conn, $query);
        $user = mysqli_fetch_assoc($result);
        $full_name = $user['full_name'];
        $profile_image = $user['profile_image'] ?? null;
        $email = $user['email'];
        $phone_number = $user['phone_number'];
        $dob = $user['dob'];
        $gender = $user['gender'];
        $address = $user['address'];
    }else{
        header("Location:index.php?page=login");
        exit;
    }    
    
?>
<!-- Main -->
    <main class="dashboard-container">
        <!-- Profile Header -->
        <section class="profile-header">

            <div class="avatar-wrapper">
                <div class="large-avatar" id="avatarTrigger" onclick="document.getElementById('avatarFileInput').click();" title="Hover and click to choose image from gallery">
                    <?php if (!empty($profile_image) && file_exists($profile_image)) { ?>
                        <img src="<?php echo htmlspecialchars($profile_image); ?>" alt="<?php echo htmlspecialchars($full_name); ?>" class="avatar-img" id="avatarImg">
                    <?php } else { ?>
                        <span class="avatar-initial" id="avatarInitial"><?php echo strtoupper($full_name[0]); ?></span>
                    <?php } ?>

                    <!-- Overlay on hover -->
                    <div class="avatar-overlay">
                        <i class="fa-solid fa-camera"></i>
                        <span>Choose Photo</span>
                    </div>
                </div>

                <div class="avatar-badge" onclick="document.getElementById('avatarFileInput').click();" title="Choose image from gallery">
                    <i class="fa-solid fa-camera"></i>
                </div>

                <input type="file" id="avatarFileInput" name="avatar" accept="image/*" style="display: none;">
            </div>

            <div id="avatarFeedback" class="avatar-feedback"></div>

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

    <script>
    document.addEventListener("DOMContentLoaded", function () {
        const fileInput = document.getElementById("avatarFileInput");
        const avatarTrigger = document.getElementById("avatarTrigger");
        const feedback = document.getElementById("avatarFeedback");

        if (!fileInput || !avatarTrigger) return;

        fileInput.addEventListener("change", function () {
            if (!this.files || !this.files[0]) return;

            const file = this.files[0];

            // Validate file format
            const validTypes = ["image/jpeg", "image/png", "image/webp", "image/gif"];
            if (!validTypes.includes(file.type)) {
                showFeedback("Please choose a valid image file (JPG, PNG, WEBP, or GIF).", "error");
                fileInput.value = "";
                return;
            }

            // Validate file size (5MB max)
            if (file.size > 5 * 1024 * 1024) {
                showFeedback("Image size must be less than 5MB.", "error");
                fileInput.value = "";
                return;
            }

            // 1. Instant local image preview
            const reader = new FileReader();
            reader.onload = function (e) {
                let img = document.getElementById("avatarImg");
                const initial = document.getElementById("avatarInitial");

                if (!img) {
                    if (initial) initial.style.display = "none";
                    img = document.createElement("img");
                    img.id = "avatarImg";
                    img.className = "avatar-img";
                    img.alt = "Profile Picture";
                    const overlay = avatarTrigger.querySelector(".avatar-overlay");
                    if (overlay) {
                        avatarTrigger.insertBefore(img, overlay);
                    } else {
                        avatarTrigger.appendChild(img);
                    }
                } else {
                    img.style.display = "block";
                }
                img.src = e.target.result;
            };
            reader.readAsDataURL(file);

            // 2. Upload to server asynchronously
            const formData = new FormData();
            formData.append("avatar", file);

            showFeedback("Saving image...", "info");

            fetch("upload-avatar.php", {
                method: "POST",
                body: formData
            })
            .then(res => res.json())
            .then(data => {
                if (data.success) {
                    showFeedback(data.message || "Profile picture updated successfully!", "success");
                } else {
                    showFeedback(data.message || "Failed to update profile picture.", "error");
                }
            })
            .catch(() => {
                showFeedback("An error occurred during upload. Please try again.", "error");
            });
        });

        function showFeedback(text, type) {
            if (!feedback) return;
            feedback.textContent = text;
            feedback.className = "avatar-feedback " + type;
            feedback.style.display = "inline-block";

            if (type === "success") {
                setTimeout(() => {
                    feedback.style.display = "none";
                }, 4000);
            }
        }
    });
    </script>


