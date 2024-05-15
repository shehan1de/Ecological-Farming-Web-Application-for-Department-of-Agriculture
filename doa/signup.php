<?php

include "database.php";

session_start();

if (isset($_SESSION["user_type"])) {
    header("location:index.php");
}


$firstNameErr = "";
$lastNameErr = "";
$emailErr = "";
$phoneNumberErr = "";
$nicNumberErr = "";
$addressErr = "";
$passwordErr = "";
$confirmPasswordErr = "";

if (isset($_POST["signup_button"])) {

    $firstName = $_POST["first_name"];
    $lastName = $_POST["last_name"];
    $email = $_POST["email"];
    $phoneNumber = $_POST["phone_number"];
    $nicNumber = $_POST["nic_number"];
    $address = $_POST["address"];
    $password = $_POST["password"];
    $confirmPassword = $_POST["confirm_password"];

    $pattern = "/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/";

    if (!preg_match($pattern, $email)) {
        $emailErr = "Invalid email address";
    }

    $errors = array();

    if (strlen($password) < 8) {
        $errors[] = "Password must be at least 8 characters long.";
    }
    if (!preg_match("/[A-Z]/", $password)) {
        $errors[] = "Password must contain at least one uppercase letter.";
    }
    if (!preg_match("/[a-z]/", $password)) {
        $errors[] = "Password must contain at least one lowercase letter.";
    }
    if (!preg_match("/[0-9]/", $password)) {
        $errors[] = "Password must contain at least one digit.";
    }
    if (!preg_match("/[!@#\$%^&*]/", $password)) {
        $errors[] = "Password must contain at least one special character (!@#$%^&*).";
    }

    if (!empty($errors)) {
        $passwordErr = "Password is not valid.";
    }


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
    if (empty($nicNumber)) {
        $nicNumberErr = "Please enter your NIC number";
    }
    if (empty($address)) {
        $addressErr = "Please enter your address";
    }
    if (empty($password)) {
        $passwordErr = "Please enter your password";
    }
    if ($confirmPassword != $password) {
        $confirmPasswordErr = "Password & Confirm Password do not match.";
    }
    if (empty($confirmPassword)) {
        $confirmPasswordErr = "Please enter your confirm password";
    }

    if (empty($firstName)) {
    } elseif (empty($lastName)) {
    } elseif (empty($email)) {
    } elseif (empty($phoneNumber)) {
    } elseif (empty($nicNumber)) {
    } elseif (empty($address)) {
    } elseif (empty($password)) {
    } elseif ($confirmPassword != $password) {
    } elseif (empty($confirmPassword)) {
    } elseif (!preg_match($pattern, $email)) {
    } elseif (!empty($errors)) {
    } else {

        $sql = "INSERT INTO `user`(`first_name`, `last_name`, `email`, `user_type`, `phone_number`, `address`, `profile_url`, `password`) VALUES 
        ('$firstName','$lastName','$email','farmer','$phoneNumber','$address','null','$password')";

        if (mysqli_query($conn, $sql)) {

            $sql = mysqli_query($conn, "SELECT * FROM `user` ORDER BY user_id DESC LIMIT 1");
            $row = mysqli_fetch_array($sql);
            if (is_array($row)) {

                $userId = $row['user_id'];
                $sql = "INSERT INTO `farmer`(`user_id`, `nic_number`) VALUES ('$userId','$nicNumber')";
                if (mysqli_query($conn, $sql)) {
                    header("location:login.php");
                }
                
            }

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
    <link rel="stylesheet" href="style/signup.css">
    <link rel="stylesheet" href="style/profile-menu.css">

    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">
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
                <div class="signup-content">
                    <form class="signup-box" method="POST">
                        <h1>SIGNUP</h1>
                        <div class="signup-input">
                            <div class="signup-content-1">
                                <input type="text" placeholder="First Name" name="first_name">
                                <p class="error-message">
                                    <?php echo $firstNameErr ?>
                                </p>
                            </div>
                            <div class="signup-content-2">
                                <input type="text" placeholder="Last Name" name="last_name">
                                <p class="error-message">
                                    <?php echo $lastNameErr ?>
                                </p>
                            </div>
                        </div>
                        <div class="signup-input">
                            <div class="signup-content-1">
                                <input type="text" placeholder="Email" name="email">
                                <p class="error-message">
                                    <?php echo $emailErr ?>
                                </p>
                            </div>
                            <div class="signup-content-2">
                                <input type="text" placeholder="Phone Number" name="phone_number">
                                <p class="error-message">
                                    <?php echo $phoneNumberErr ?>
                                </p>
                            </div>
                        </div>
                        <div class="signup-input">
                            <div class="signup-content-1 one">
                                <input type="text" placeholder="NIC Number" name="nic_number">
                                <p class="error-message">
                                    <?php echo $nicNumberErr ?>
                                </p>
                            </div>
                        </div>
                        <div class="signup-input">
                            <div class="signup-content-1 textarea">
                                <textarea placeholder="Address" name="address"></textarea>
                                <p class="error-message">
                                    <?php echo $addressErr ?>
                                </p>
                            </div>
                        </div>
                        <div class="signup-input">
                            <div class="signup-content-1">
                                <input type="password" placeholder="Password" name="password">
                                <p class="error-message">
                                    <?php echo $passwordErr ?>
                                </p>
                            </div>
                            <div class="signup-content-2">
                                <input type="password" placeholder="Confirm Password" name="confirm_password">
                                <p class="error-message">
                                    <?php echo $confirmPasswordErr ?>
                                </p>
                            </div>
                        </div>
                        <div class="signup-input one">
                            <input type="submit" value="Signup" name="signup_button">
                        </div>
                        <p>Already have an account? <a href="login.php">Login</a></p>
                    </form>
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