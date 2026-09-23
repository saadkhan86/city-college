<?php

if (!isset($_SESSION['user'])) {
    header("Location: index.php?page=login");
    exit;
}

$id = $_SESSION['user']['id'];


// UPDATE PROFILE
if (isset($_POST['update_profile'])) {

    $full_name = $_POST['full_name'];
    $phone_number = $_POST['phone_number'];
    $dob = $_POST['dob'];
    $gender = $_POST['gender'];
    $address = $_POST['address'];

    $query = "UPDATE students
              SET
                  full_name = '$full_name',
                  phone_number = '$phone_number',
                  dob = '$dob',
                  gender = '$gender',
                  address = '$address'
              WHERE id = '$id'";

    $result = mysqli_query($conn, $query);

    if ($result) {

        // Session mein bhi updated name rakh do
        $_SESSION['user']['full_name'] = $full_name;

        header("Location: index.php?page=profile");
        exit;

    } else {

        echo "Profile update failed: " . mysqli_error($conn);
    }
}


// GET USER DATA
$query = "SELECT * FROM students WHERE id = '$id'";

$result = mysqli_query($conn, $query);

$user = mysqli_fetch_assoc($result);

$full_name = $user['full_name'];
$email = $user['email'];
$phone_number = $user['phone_number'];
$dob = $user['dob'];
$gender = $user['gender'];
$address = $user['address'];

?>

<main class="dashboard-container">

    <section class="profile-header">

        <div class="large-avatar">

            <?php
            echo strtoupper(
                substr($full_name, 0, 2)
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