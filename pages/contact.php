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

        <section class="welcome-section">

            <div>

                <p class="welcome-label">
                    GET IN TOUCH
                </p>

                <h1>
                    Contact City College 📩
                </h1>

                <p class="welcome-text">
                    Have a question or need assistance?
                    Send us a message and we'll get back
                    to you.
                </p>

            </div>

            <div class="college-badge">

                <span>CC</span>

                <div>
                    <strong>City College</strong>
                    <small>Student Portal</small>
                </div>

            </div>

        </section>


        <div class="contact-layout">


            <!-- Contact Information -->
            <div class="contact-info">

                <div class="section-heading">

                    <h2>
                        Contact Information
                    </h2>

                    <p>
                        You can reach us through the
                        following channels.
                    </p>

                </div>


                <div class="contact-card">

                    <div class="card-icon profile-icon">
                        📍
                    </div>

                    <div>
                        <h3>
                            Address
                        </h3>

                        <p>
                            City College<br>
                            Multan, Pakistan
                        </p>
                    </div>

                </div>


                <div class="contact-card">

                    <div class="card-icon about-icon">
                        📧
                    </div>

                    <div>
                        <h3>
                            Email
                        </h3>

                        <p>
                            info@citycollege.edu.pk
                        </p>
                    </div>

                </div>


                <div class="contact-card">

                    <div class="card-icon contact-icon">
                        📞
                    </div>

                    <div>
                        <h3>
                            Phone
                        </h3>

                        <p>
                            +92 300 0000000
                        </p>
                    </div>

                </div>

            </div>


            <!-- Contact Form -->
            <div class="contact-form-card">

                <h2>
                    Send us a message
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

