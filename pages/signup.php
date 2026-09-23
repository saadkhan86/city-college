<?php

$message = '';
$messageType = '';

if (isset($_POST['submit'])) {

    $full_name = $_POST['full_name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $phone_number = $_POST['phone_number'];
    $dob = $_POST['dob'];
    $gender = $_POST['gender'];
    $address = $_POST['address'];

    // Check email already exists
    $query = "SELECT * FROM students WHERE email = '$email'";

    $existing = mysqli_query($conn, $query);

    if (mysqli_num_rows($existing) > 0) {

        $message = 'Email already exists! Try to login.';
        $messageType = 'error';

    } else {

        // Insert new student
        $query = "INSERT INTO students
                  (full_name, email, password, phone_number, dob, gender, address)
                  VALUES
                  ('$full_name', '$email', '$password', '$phone_number', '$dob', '$gender', '$address')";

        $result = mysqli_query($conn, $query);

        if ($result) {

            $message = 'Signup Successful! You can login now.';
            $messageType = 'success';

        } else {

            $message = 'Signup Failed. Try again.';
            $messageType = 'error';
        }
    }
}

?>

<main class="auth-page">

    <div class="auth-container">

        <h2>Student Signup</h2>


        <?php if (!empty($message)) { ?>

            <div class="message <?php echo $messageType; ?>">
                <?php echo $message; ?>
            </div>

        <?php } ?>


        <form method="POST">

            <!-- Full Name -->
            <div class="form-group">

                <label>Full Name</label>

                <input
                    type="text"
                    name="full_name"
                    placeholder="Enter your full name"
                    required
                >

            </div>


            <!-- Email -->
            <div class="form-group">

                <label>Email</label>

                <input
                    type="email"
                    name="email"
                    placeholder="Enter your email"
                    required
                >

            </div>


            <!-- Password -->
            <div class="form-group">

                <label>Password</label>

                <div class="password-box">

                    <input
                        type="password"
                        id="signupPassword"
                        name="password"
                        placeholder="Enter your password"
                        required
                    >

                    <span
                        class="show-password"
                        onclick="togglePassword()"
                    >
                        Show
                    </span>

                </div>

            </div>


            <!-- Phone Number -->
            <div class="form-group">

                <label>Phone Number</label>

                <input
                    type="text"
                    name="phone_number"
                    placeholder="+92 300 1234567"
                >

            </div>


            <!-- Date of Birth -->
            <div class="form-group">

                <label>Date of Birth</label>

                <input
                    type="date"
                    name="dob"
                >

            </div>


            <!-- Gender -->
            <div class="form-group">

                <label>Gender</label>

                <select name="gender">

                    <option value="">Select Gender</option>

                    <option value="male">
                        Male
                    </option>

                    <option value="female">
                        Female
                    </option>

                    <option value="other">
                        Other
                    </option>

                </select>

            </div>


            <!-- Address -->
            <div class="form-group">

                <label>Address</label>

                <input
                    type="text"
                    name="address"
                    placeholder="Enter your address"
                >

            </div>


            <!-- Submit -->
            <button
                type="submit"
                name="submit"
                class="auth-button"
            >
                Sign Up
            </button>

        </form>


        <div class="auth-link">

            Already have an account?

            <a href="index.php?page=login">
                Login
            </a>

        </div>

    </div>


    <script>

        function togglePassword() {

            const password =
                document.getElementById("signupPassword");

            const button =
                document.querySelector(".show-password");

            if (password.type === "password") {

                password.type = "text";
                button.innerText = "Hide";

            } else {

                password.type = "password";
                button.innerText = "Show";
            }
        }

    </script>


    <?php if ($messageType === 'success') { ?>

        <script>

            setTimeout(function () {

                window.location.href =
                    "index.php?page=login";

            }, 2000);

        </script>

    <?php } ?>

</main>