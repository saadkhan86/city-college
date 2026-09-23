<?php

$message = "";
$messageType = "";

if (isset($_POST['login'])) {

    $email = $_POST['email'];
    $password = $_POST['password'];

    $query = "SELECT * FROM students
              WHERE email = '$email'
              AND password = '$password'";
    
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 1) {
        $user = mysqli_fetch_assoc($result);
        
        $_SESSION['user'] = [
            'id' => $user['id'],
            'full_name' => $user['full_name'],
        ];
        $message = "Login successful";
        $messageType = "success";

    } else {

        $message = "Invalid Credentials";
        $messageType = "error";
    }
}

?>

<main class="auth-page">

    <div class="auth-container">

        <h2>Student Login</h2>

        <?php if (!empty($message)) { ?>

            <div class="message <?php echo $messageType; ?>">
                <?php echo $message; ?>
            </div>

        <?php } ?>


        <form method="POST">

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
                        id="loginPassword"
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
                name="login"
                class="auth-button"
            >
                Login
            </button>

        </form>


        <div class="auth-link">

            Don't have an account?

            <a href="index.php?page=signup">
                Sign Up
            </a>

        </div>

    </div>


    <script>

        function togglePassword() {

            const password =
                document.getElementById("loginPassword");

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


    <?php if ($messageType === "success") { ?>

        <script>

            setTimeout(function () {

                window.location.href =
                    "index.php?page=dashboard";

            }, 700);

        </script>

    <?php } ?>

</main>
