<?php
$message = "";

if (isset($_POST["submit"])) {

    $name = $_POST["name"];
    $email = $_POST["email"];
    $subject = $_POST["subject"];
    $messageText = $_POST["message"];

    $message = "Your message has been sent successfully!";
}
?>
    <main class="dashboard-container">
        <div class="contact-layout">
            <div class="contact-form-card">

                <h2>
                    Contact us directly
                </h2>

                <p>
                    Fill out the form below.
                </p>


                <?php if (!empty($message)) { ?>

                    <div class="message success">
                        <?php echo $message; ?>
                    </div>

                <?php } ?>


                <form method="POST">

                    <div class="form-row">

                        <div class="form-field">

                            <label>
                                Name
                            </label>

                            <input
                                type="text"
                                name="name"
                                placeholder="Your name"
                                required
                            >

                        </div>


                        <div class="form-field">

                            <label>
                                Email
                            </label>

                            <input
                                type="email"
                                name="email"
                                placeholder="Your email"
                                required
                            >

                        </div>

                    </div>


                    <div class="form-field">

                        <label>
                            Subject
                        </label>

                        <input
                            type="text"
                            name="subject"
                            placeholder="Message subject"
                            required
                        >

                    </div>


                    <div class="form-field">

                        <label>
                            Message
                        </label>

                        <textarea
                            name="message"
                            rows="5"
                            placeholder="Write your message..."
                            required
                        ></textarea>

                    </div>


                    <button
                        type="submit"
                        name="submit"
                        class="primary-btn"
                    >
                        Send Message
                    </button>

                </form>

            </div>

        </div>

    </main>

