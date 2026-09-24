<?php

if (!isset($_SESSION['user'])) {
    header("Location: index.php?page=login");
    exit;
}

$id = $_SESSION['user']['id'];


// UPDATE PROFILE
if (isset($_POST['update_profile'])) {

    $full_name = trim($_POST['full_name'] ?? '');
    $phone_number = trim($_POST['phone_number'] ?? '');
    $dob = trim($_POST['dob'] ?? '');
    $gender = trim($_POST['gender'] ?? '');
    $address = trim($_POST['address'] ?? '');

    if (empty($full_name)) {
        $_SESSION['flash_message'] = "Full name cannot be empty.";
        $_SESSION['flash_type'] = "error";
        header("Location: index.php?page=edit-profile");
        exit;
    }

    $full_name_esc = mysqli_real_escape_string($conn, $full_name);
    $phone_esc = mysqli_real_escape_string($conn, $phone_number);
    $dob_esc = mysqli_real_escape_string($conn, $dob);
    $gender_esc = mysqli_real_escape_string($conn, $gender);
    $address_esc = mysqli_real_escape_string($conn, $address);

    $query = "UPDATE students
              SET
                  full_name = '$full_name_esc',
                  phone_number = '$phone_esc',
                  dob = '$dob_esc',
                  gender = '$gender_esc',
                  address = '$address_esc'
              WHERE id = '$id'";

    $result = mysqli_query($conn, $query);

    if ($result) {
        $_SESSION['user']['full_name'] = $full_name;
        $_SESSION['flash_message'] = "Profile updated successfully!";
        $_SESSION['flash_type'] = "success";
        header("Location: index.php?page=edit-profile");
        exit;
    } else {
        $_SESSION['flash_message'] = "Profile update failed: " . mysqli_error($conn);
        $_SESSION['flash_type'] = "error";
        header("Location: index.php?page=edit-profile");
        exit;
    }
}


// GET USER DATA
$query = "SELECT * FROM students WHERE id = '$id'";
$result = mysqli_query($conn, $query);
$user = mysqli_fetch_assoc($result);

$full_name = $user['full_name'] ?? '';
$profile_image = $user['profile_image'] ?? '';
$email = $user['email'] ?? '';
$phone_number = $user['phone_number'] ?? '';
$dob = $user['dob'] ?? '';
$gender = $user['gender'] ?? '';
$address = $user['address'] ?? '';

// Flash message retrieval
$flashMessage = $_SESSION['flash_message'] ?? null;
$flashType = $_SESSION['flash_type'] ?? 'info';
unset($_SESSION['flash_message'], $_SESSION['flash_type']);

?>

<main class="dashboard-container">

    <section class="profile-header">

        <div class="profile-header-info">

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

        <?php if (!empty($flashMessage)) { ?>
            <div class="alert-box <?php echo $flashType; ?>">
                <i class="fa-solid <?php echo ($flashType === 'success') ? 'fa-circle-check' : 'fa-circle-exclamation'; ?>"></i>
                <span><?php echo htmlspecialchars($flashMessage); ?></span>
            </div>
        <?php } ?>

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
                    value="<?php echo $full_name; ?>"
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
                    value="<?php echo $email; ?>"
                    readonly
                >

            </div>


            <!-- Phone Number -->
            <div class="form-field">

                <label>
                    Phone Number
                </label>

                <input
                    type="text"
                    name="phone_number"
                    value="<?php echo $phone_number; ?>"
                >

            </div>


            <!-- Date of Birth -->
            <div class="form-field">

                <label>
                    Date of Birth
                </label>

                <input
                    type="date"
                    name="dob"
                    value="<?php echo $dob; ?>"
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

                    <option
                        value="male"
                        <?php if ($gender == 'male') echo 'selected'; ?>
                    >
                        Male
                    </option>

                    <option
                        value="female"
                        <?php if ($gender == 'female') echo 'selected'; ?>
                    >
                        Female
                    </option>

                    <option
                        value="other"
                        <?php if ($gender == 'other') echo 'selected'; ?>
                    >
                        Other
                    </option>

                </select>

            </div>


            <!-- Address -->
            <div class="form-field">

                <label>
                    Address
                </label>

                <input
                    type="text"
                    name="address"
                    value="<?php echo $address; ?>"
                    placeholder="Enter your address"
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