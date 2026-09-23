<?php

$message = '';
$messageType = '';

if (isset($_POST['submit'])) {

    $full_name = $_POST['full_name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $query = "SELECT * FROM students WHERE email = '$email'";

    $existing = mysqli_query($conn, $query);

    if (mysqli_num_rows($existing) > 0) {

        $message = 'Email already exists! Try to login.';
        $messageType = 'error';

    } else {

        $query = "INSERT INTO students (full_name, email, password)
                  VALUES ('$full_name', '$email', '$password')";

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

            <div class="form-group">

                <label>Full Name</label>

                <input
                    type="text"
                    name="full_name"
                    placeholder="Enter your full name"
                    required
                >

            </div>


            <div class="form-group">

                <label>Email</label>

                <input
                    type="email"
                    name="email"
                    placeholder="Enter your email"
                    required
                >

            </div>


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
