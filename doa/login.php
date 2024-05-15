<?php

include "database.php";
session_start();

if (isset($_SESSION["user_id"])) {
    header("location:index.php");
}

// echo $row['user_id'];

$emailErr = "";
$passwordErr = "";

$errorMessage = "";

if (isset($_POST["login"])) {
    $email = $_POST["email"];
    $password = $_POST["password"];

    if (empty($email)) {
        $emailErr = "Please enter your email";
    }
    if (empty($password)) {
        $passwordErr = "Please enter your password";
    }

    if (empty($email)) {
    } elseif (empty($password)) {
    } else {
        $sql = mysqli_query($conn, "SELECT * FROM `user` WHERE email = '$email' AND password = '$password'");
        $row = mysqli_fetch_array($sql);
        if (is_array($row)) {

            $_SESSION["user_type"] = $row['user_type'];
            $_SESSION["user_id"] = $row['user_id'];
            $_SESSION["profile_url"] = $row['profile_url'];
            header("location:index.php");

        } else {
            $errorMessage = "Email or password is incorrect";
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
    <title>Login</title>
    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="style/nav.css">
    <link rel="stylesheet" href="style/footer.css">
    <link rel="stylesheet" href="style/login.css">
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
                <div class="login-content">
                    <form class="login-box" method="POST">
                        <?php if ($errorMessage) {

                            echo "
                                    <div class='header-error-message'>
                                        <p>$errorMessage</p>
                                    </div>
                                ";
                        }
                        ?>
                        <div class="login-header">
                            <img src="images/logo.png" alt="">
                        </div>
                        <h1>LOGIN</h1>
                        <div class="login-input">
                            <input type="text" placeholder="Email" name="email">
                            <p class="error-message">
                                <?php echo $emailErr ?>
                            </p>
                            <input type="password" placeholder="Password" name="password">
                            <p class="error-message">
                                <?php echo $passwordErr ?>
                            </p>
                            <!-- <p class="forget"><a href="">Forgot password</a></p> -->
                            <input type="submit" value="Login" name="login">
                            <p>Don't have an account? <a href="signup.php">Create Account</a></p>
                        </div>
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