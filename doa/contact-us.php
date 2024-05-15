<?php

include "database.php";

session_start();

$firstNameErr = "";
$lastNameErr = "";
$emailErr = "";
$phoneNumberErr = "";
$subjectErr = "";
$messageErr = "";

if (isset($_POST["message_send"])) {

    $firstName = $_POST["first_name"];
    $lastName = $_POST["last_name"];
    $email = $_POST["email"];
    $phoneNumber = $_POST["phone_number"];
    $subject = $_POST["subject"];
    $message = $_POST["message"];

    if (empty($firstName)) {
        $firstNameErr = "Please enter your first name";
    }
    if (empty($lastName)) {
        $lastNameErr = "Please enter your last name";
    }
    if (empty($email)) {
        $emailErr = "Please enter your email";
    }
    if (empty($phoneNumber)) {
        $phoneNumberErr = "Please enter your phone number";
    }
    if (empty($subject)) {
        $subjectErr = "Please enter your subject";
    }
    if (empty($message)) {
        $messageErr = "Please enter your message";
    }
    $date = date("F j, Y");

    if (empty($firstName)) {
    } elseif (empty($lastName)) {
    } elseif (empty($email)) {
    } elseif (empty($phoneNumber)) {
    } elseif (empty($subject)) {
    } elseif (empty($message)) {
    } else {

        $sql = "INSERT INTO `contact_us`(`first_name`, `last_name`, `phone_number`, `email`, `subject`, `message`, `date`) 
        VALUES ('$firstName','$lastName','$phoneNumber','$email','$subject','$message','$date')";

        if (mysqli_query($conn, $sql)) {

            header("location:contact-us.php?success");
        }

    }

}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="style/nav.css">
    <link rel="stylesheet" href="style/footer.css">
    <link rel="stylesheet" href="style/contact-us.css">
    <link rel="stylesheet" href="style/input.css">
    <link rel="stylesheet" href="style/profile-menu.css">

    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">

    <style>
        .nav-2-content-1 ul li:nth-child(6) a {
            color: var(--hover-link);
        }
    </style>

</head>

<body>
    <div class="container">
        <div class="content">
            <?php
            include "menu.php";
            ?>

            <?php
            include "nav.php";
            ?>
            <section>
                <div class="box">
                    <div class="contact-content">
                        <div class="section-header-content">
                            <div class="top-to-bottom-line"></div>
                            <h3>Contact Us</h3>
                            <h1>Get In Touch</h1>
                        </div>
                        <div class="contact">
                            <div class="contact-content-1">
                                <div class="contact-location revealLeftToRight reveal">
                                    <div class="contact-locaiton-content-1">
                                        <i class="ri-map-pin-line"></i>
                                    </div>
                                    <div class="contact-locaiton-content-2">
                                        <h2>Location</h2>
                                        <p>Department of Agriculture,<br>
                                            P.O.Box. 1, Peradeniya,<br>
                                            Sri Lanka.
                                        </p>
                                    </div>
                                </div>
                                <div class="sec-hr"></div>
                                <div class="contact-hotline revealLeftToRight reveal">
                                    <div class="contact-hotline-content-1">
                                        <i class="ri-customer-service-2-line"></i>
                                    </div>
                                    <div class="contact-hotline-content-2">
                                        <h2>Call support</h2>
                                        <p><a href="tel:+94770000000">077 0 000 000</a></p>
                                        <h2>24x7 Hotlie</h2>
                                        <p><a href="tel:+94112800200">011 2 800 200</a></p>
                                    </div>
                                </div>
                                <div class="sec-hr"></div>
                                <div class="contact-mail revealLeftToRight reveal">
                                    <div class="contact-mail-content-1">
                                        <i class="ri-mail-line"></i>
                                    </div>
                                    <div class="contact-mail-content-2">
                                        <h2>Email us</h2>
                                        <p><a href="mailto:doa@gmail.com">doa@gmail.com</a></p>

                                    </div>
                                </div>
                            </div>
                            <form method="POST" class="contact-content-2">
                                <?php
                                if (isset($_GET['success'])) {
                                    echo '
                                            <div class="header-error-message">
                                                <p>Message has been successfully sent</p>
                                            </div>
                                        ';
                                }
                                ?>
                                <div class="contact-content-2-name">
                                    <div class="content-2-first-name ">
                                        <div class="input-group">
                                            <input type="text" required name="first_name">
                                            <label for="">First Name <span>*</span></label>
                                        </div>
                                        <p class="error-message">
                                            <?php echo $firstNameErr ?>
                                        </p>
                                    </div>
                                    <div class="content-2-last-name">
                                        <div class="input-group">
                                            <input type="text" required name="last_name">
                                            <label for="">Last Name <span>*</span></label>
                                        </div>
                                        <p class="error-message">
                                            <?php echo $lastNameErr ?>
                                        </p>
                                    </div>
                                </div>

                                <div class="contact-content-2-email-phone">
                                    <div class="content-2-phone">
                                        <div class="input-group">
                                            <input type="text" required name="phone_number">
                                            <label for="">Phone Number</label>
                                        </div>
                                        <p class="error-message">
                                            <?php echo $phoneNumberErr ?>
                                        </p>
                                    </div>
                                    <div class="content-2-email">
                                        <div class="input-group">
                                            <input type="text" required name="email">
                                            <label for="">Email <span>*</span></label>
                                        </div>
                                        <p class="error-message">
                                            <?php echo $emailErr ?>
                                        </p>
                                    </div>
                                </div>

                                <div class="contact-content-2-subject">
                                    <div class="input-group">
                                        <input type="text" required name="subject">
                                        <label for="">Subject <span>*</span></label>
                                    </div>
                                    <p class="error-message">
                                        <?php echo $subjectErr ?>
                                    </p>
                                </div>

                                <div class="contact-content-2-message">
                                    <div class="input-group">
                                        <textarea required name="message"></textarea>
                                        <label for="">Message <span>*</span></label>
                                    </div>
                                    <p class="error-message">
                                        <?php echo $messageErr ?>
                                    </p>
                                </div>

                                <div class="contact-content-2-button">
                                    <input type="submit" value="SEND MESSAGE" name="message_send">
                                </div>

                            </form>

                        </div>
                    </div>
                </div>
            </section>
        </div>
        <?php
        include "footer.php"
            ?>
    </div>
    <script src="js/script.js"></script>
</body>

</html>