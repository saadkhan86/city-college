
<main class="dashboard-container">

    <section class="profile-header">

        <div class="large-avatar">
            <?php
            echo strtoupper(
                substr($_SESSION['user']['full_name'], 0, 2)
            );
            ?>
        </div>

        <div class="profile-header-info">

            <span class="profile-label">
                EDIT PROFILE
            </span>

            <h1>
                Edit Your Profile
            </h1>

            <p>
                Update your personal information.
            </p>

        </div>

    </section>


    <!-- Edit Profile Form -->
    <div class="profile-card">

        <div class="profile-card-header">

            <div>
                <h2>Personal Information</h2>

                <p>
                    Update your basic personal details.
                </p>
            </div>

            <span class="card-header-icon">
                ✏️
            </span>

        </div>


        <form method="POST" class="edit-profile-form">

            <!-- Full Name -->
            <div class="form-field">

                <label>
                    Full Name
                </label>

                <input
                    type="text"
                    name="full_name"
                    value="<?php echo $_SESSION['user']['full_name']; ?>"
                    required
                >

            </div>


            <!-- Email -->
            <div class="form-field">

                <label>
                    Email
                </label>

                <input
                    type="email"
                    name="email"
                    value="<?php echo $_SESSION['user']['email']; ?>"
                    required
                >

            </div>


            <!-- Phone -->
            <div class="form-field">

                <label>
                    Phone
                </label>

                <input
                    type="text"
                    name="phone"
                    placeholder="+92 300 1234567"
                >

            </div>


            <!-- Date of Birth -->
            <div class="form-field">

                <label>
                    Date of Birth
                </label>

                <input
                    type="date"
                    name="date_of_birth"
                >

            </div>


            <!-- Gender -->
            <div class="form-field">

                <label>
                    Gender
                </label>

                <select name="gender">

                    <option value="">
                        Select Gender
                    </option>

                    <option value="male">
                        Male
                    </option>

                    <option value="female">
                        Female
                    </option>

                </select>

            </div>


            <!-- City -->
            <div class="form-field">

                <label>
                    City
                </label>

                <input
                    type="text"
                    name="city"
                    placeholder="Multan"
                >

            </div>


            <!-- Actions -->
            <div class="profile-actions">

                <a
                    href="index.php?page=profile"
                    class="secondary-btn"
                >
                    Cancel
                </a>

                <button
                    type="submit"
                    name="update_profile"
                    class="primary-btn"
                >
                    Save Changes
                </button>

            </div>

        </form>

    </div>

</main>