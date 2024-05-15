<?php

include "database.php";
session_start();

$userId = "";

if (!isset($_SESSION["user_id"])) {
    header("location:login.php");
} else {
    $userId = $_SESSION["user_id"];
}

$userNicOrEmpId = "";

$sql = mysqli_query($conn, "SELECT * FROM `user` WHERE user_id = '$userId'");
$row = mysqli_fetch_array($sql);

if ($row['user_type'] == "farmer") {
    $sql2 = mysqli_query($conn, "SELECT * FROM `farmer` WHERE user_id = '$userId'");
    $row2 = mysqli_fetch_array($sql2);
    $userNicOrEmpId = $row2["nic_number"];

} elseif ($row['user_type'] == "field_officer") {
    $sql2 = mysqli_query($conn, "SELECT * FROM `field_officer` WHERE user_id = '$userId'");
    $row2 = mysqli_fetch_array($sql2);
    $userNicOrEmpId = $row2["emp_id"];
} else {
    $sql2 = mysqli_query($conn, "SELECT * FROM `admin` WHERE user_id = '$userId'");
    $row2 = mysqli_fetch_array($sql2);
    $userNicOrEmpId = $row2["emp_id"];
}

// echo $userNicOrEmpId;

$firstNameErr = "";
$lastNameErr = "";
$emailErr = "";
$phoneNumberErr = "";
$addressErr = "";

if (isset($_POST["save_button"])) {

    $firstName = $_POST["first_name"];
    $lastName = $_POST["last_name"];
    $phoneNumber = $_POST["phone_number"];
    $address = $_POST["address"];

    if (empty($firstName)) {
        $firstNameErr = "Please enter your first name";
    }
    if (empty($lastName)) {
        $lastNameErr = "Please enter your last name";
    }
    if (empty($phoneNumber)) {
        $phoneNumberErr = "Please enter your phone number";
    }
    if (empty($address)) {
        $addressErr = "Please enter your address";
    }

    $file_name = $_FILES["profile-pic"]["name"];
    $file_temp = $_FILES["profile-pic"]["tmp_name"];
    $file_error = $_FILES["profile-pic"]["error"];

    $min = 10000;
    $max = 10000000000000;
    $random_number = rand($min, $max);
    $encryptedProfileLink = md5($firstName . $lastName . $random_number);

    $extension = pathinfo($file_name, PATHINFO_EXTENSION);
    $folder = "images/profile-pic/" . $encryptedProfileLink . "." . $extension;

    if ($extension == "") {
        $update = "UPDATE `user` SET `first_name`='$firstName',`last_name`='$lastName',`phone_number`='$phoneNumber',`address`='$address' WHERE user_id = '$userId'";
        mysqli_query($conn, $update);

    } else {
        $update = "UPDATE `user` SET `first_name`='$firstName',`last_name`='$lastName',`phone_number`='$phoneNumber',`address`='$address',`profile_url` = '$folder' WHERE user_id = '$userId'";
        mysqli_query($conn, $update);
        if (!$file_error > 0) {
            move_uploaded_file($file_temp, $folder);
        }
    }

}

$sql = mysqli_query($conn, "SELECT * FROM `user` WHERE user_id = '$userId'");
$row = mysqli_fetch_array($sql);

$sql2 = mysqli_query($conn, "SELECT * FROM `farmer` WHERE user_id = '$userId'");
$row2 = mysqli_fetch_array($sql2);

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
    <link rel="stylesheet" href="style/home.css">
    <link rel="stylesheet" href="style/profile-menu.css">
    <link rel="stylesheet" href="style/profile.css">

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
                <div class="box">
                    <form class="profile-content" method="POST" enctype="multipart/form-data">
                        <div class="profile-header">
                            <div class="profile-image" id="profile-image">
                                <img src="<?php
                                if (is_array($row)) {
                                    if ($row['profile_url'] == "null") {
                                        echo "images/user.png";
                                    } else {
                                        echo $row['profile_url'];
                                    }
                                }
                                ?>" alt="" id="profile-img">
                                <div class=""></div>
                                <i class="ri-camera-line"></i>
                                <input type="file" name="profile-pic" style="visibility: hidden; position: absolute;"
                                    id="image-input">
                            </div>
                            <h1>
                                <?php
                                if (is_array($row)) {
                                    echo $row['first_name'];
                                    echo " ";
                                    echo $row['last_name'];
                                }
                                ?>
                            </h1>
                        </div>
                        <div class="profile-details">
                            <div class="signup-box">
                                <div class="signup-input">
                                    <div class="signup-content-1">
                                        <input type="text" placeholder="First Name" name="first_name" value="<?php
                                        if (is_array($row)) {
                                            echo $row['first_name'];
                                        }
                                        ?>">
                                        <p class="error-message">
                                            <?php echo $firstNameErr ?>
                                        </p>
                                    </div>
                                    <div class="signup-content-2">
                                        <input type="text" placeholder="Last Name" name="last_name" value="<?php
                                        if (is_array($row)) {
                                            echo $row['last_name'];
                                        }
                                        ?>">
                                        <p class="error-message">
                                            <?php echo $lastNameErr ?>
                                        </p>
                                    </div>
                                </div>
                                <div class="signup-input">
                                    <div class="signup-content-1">
                                        <input type="text" placeholder="Email" name="email" disabled value="<?php
                                        if (is_array($row)) {
                                            echo $row['email'];
                                        }
                                        ?>">
                                    </div>
                                    <div class="signup-content-2">
                                        <input type="text" placeholder="Phone Number" name="phone_number" value="<?php
                                        if (is_array($row)) {
                                            echo $row['phone_number'];
                                        }
                                        ?>">
                                        <p class="error-message">
                                            <?php echo $phoneNumberErr ?>
                                        </p>
                                    </div>
                                </div>
                                <div class="signup-input">
                                    <div class="signup-content-1 one">
                                        <input type="text" placeholder="NIC Number" disabled value="<?php
                                        // if (is_array($row)) {
                                            echo $userNicOrEmpId;
                                        // }
                                        ?>">
                                    </div>
                                </div>
                                <div class="signup-input">
                                    <div class="signup-content-1 textarea">
                                        <textarea placeholder="Address" name="address"><?php
                                        if (is_array($row)) {
                                            echo $row['address'];
                                        }
                                        ?></textarea>
                                        <p class="error-message">
                                            <?php echo $addressErr ?>
                                        </p>
                                    </div>
                                </div>
                                <div class="signup-input one">
                                    <input type="submit" value="Save" name="save_button">
                                </div>
                            </div>
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
    <script src="js/profile.js"></script>
</body>

</html>