<?php

include "../database.php";
session_start();

$userId = '';
$row = '';

if (!isset($_SESSION["user_id"])) {

    header("location:../login.php");

} else {

    if ($_SESSION['user_type'] == "admin") {

        $userId = $_SESSION["user_id"];
        $sql = mysqli_query($conn, "SELECT * FROM `user` WHERE user_id = '$userId'");
        $row = mysqli_fetch_array($sql);

    } else {

        header("location:../index.php");

    }

}

$firstNameErr = "";
$lastNameErr = "";
$emailErr = "";
$phoneNumberErr = "";
$empIdErr = "";
$districtErr = "";

$addressErr = "";
$passwordErr = "";
$confirmPasswordErr = "";

if (isset($_POST["create_account"])) {

    $firstName = $_POST["first_name"];
    $lastName = $_POST["last_name"];
    $email = $_POST["email"];
    $phoneNumber = $_POST["phone_number"];
    $empId = $_POST["emp_id"];
    $district = $_POST["district"];
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
    if (empty($empId)) {
        $empIdErr = "Please enter your emp id";
    }
    if (empty($district)) {
        $districtErr = "Please select a district";
    }
    if (empty($district)) {
        $districtErr = "Please enter your emp id";
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
    } elseif (empty($empId)) {
    } elseif (empty($address)) {
    } elseif (empty($password)) {
    } elseif ($confirmPassword != $password) {
    } elseif (empty($confirmPassword)) {
    } elseif (!preg_match($pattern, $email)) {
    } elseif (!empty($errors)) {
    } else {

        $sql = "INSERT INTO `user`(`first_name`, `last_name`, `email`, `user_type`, `phone_number`, `address`, `profile_url`, `password`) VALUES 
        ('$firstName','$lastName','$email','field_officer','$phoneNumber','$address','null','$password')";

        if (mysqli_query($conn, $sql)) {

            $sql = mysqli_query($conn, "SELECT * FROM `user` ORDER BY user_id DESC LIMIT 1");
            $row = mysqli_fetch_array($sql);
            if (is_array($row)) {

                $userId = $row['user_id'];

                $sql = "INSERT INTO `field_officer`(`user_id`, `emp_id`, `location`) 
                VALUES ('$userId','$empId','$district')";
                if (mysqli_query($conn, $sql)) {
                    header("location:feild-officer.php?success=true");
                    // $_SESSION['success'] = true;
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
    <!-- <link rel="stylesheet" href="../style/style.css"> -->
    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="style/nav.css">
    <link rel="stylesheet" href="style/menu.css">

    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">

    <title>Document</title>
</head>

<body>
    <div class="container">
        <div class="content">

            <section>
                <div class="menu">
                <div class="menu-header ">
                        <i class="ri-user-line"></i>
                        <p>
                            <?php if (is_array($row)) {
                                echo $row['first_name'];
                            } ?>
                        </p>
                    </div>
                    <div class="menu-content ">
                        <div class="menu-item" onclick="window.location.href ='index.php'">
                            <i class="ri-user-add-line"></i>
                            <p>Create Admin</p>
                        </div>
                        <div class="menu-item active" onclick="window.location.href ='feild-officer.php'">
                            <i class="ri-user-add-line"></i>
                            <p>Create Field Officer</p>
                        </div>
                        <div class="menu-item " onclick="window.location.href ='news.php'">
                            <i class="ri-newspaper-line"></i>
                            <p>Add News</p>
                        </div>
                        <div class="menu-item" onclick="window.location.href ='consulting.php'">
                            <i class="ri-customer-service-2-line"></i>
                            <p>Add Consulting</p>
                        </div>
                        <div class="menu-item" onclick="window.location.href ='courses.php'">
                            <i class="ri-graduation-cap-line"></i>
                            <p>Add Course</p>
                        </div>
                        <div class="menu-item" onclick="window.location.href ='gallery.php'">
                            <i class="ri-image-add-line"></i>
                            <p>Gallery</p>
                        </div>
                        <div class="menu-item bottom" onclick="window.location.href ='../logout.php'">
                            <i class="ri-logout-box-line"></i>
                            <p>Logout</p>
                        </div>
                    </div>
                </div>


                <div class="all-content">
                <nav>
                        <div class="box-1">
                            <div class="nav-content">
                                <div class="nav-content-1">
                                    <p>Add news</p>
                                </div>
                                <div class="nav-content-2">
                                    <a href="../profile.php" class="profile-icon">
                                        <img src="<?php
                                        
                                        if (is_array($row)) {      
                                            if($row['profile_url'] == "null"){
                                                echo '../images/profile-icon.jpg';
                                            }else{
                                                echo '../'.$row['profile_url'];
                                            }                                  
                                            
                                        }else{
                                            echo '../images/profile-icon.jpg';
                                        }
                                        ?>
                                        " alt="">';
                                    </a>
                                </div>
                            </div>
                        </div>
                    </nav>
                    
                    
                    <div class="box-1">
                        <div class="section-content">
                            <div class="profile-details">
                                <form class="signup-box" method="POST">
                                <?php
                                    if (isset($_GET['success'])) {
                                            echo '
                                            <div class="header-error-message">
                                                <p>Account has been successfully created</p>
                                            </div>
                                        ';
                                    }
                                    ?>
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
                                            <input type="text" placeholder="Employee Id" name="emp_id">
                                            <p class="error-message">
                                                <?php echo $empIdErr ?>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="signup-input">
                                        <div class="signup-content-1 one">
                                            <!-- <input type="text" placeholder="location"> -->
                                            <select id="district" name="district">
                                                <option value="district">District</option>
                                                <option value="Colombo">Colombo</option>
                                                <option value="Gampaha">Gampaha</option>
                                                <option value="Kalutara">Kalutara</option>
                                                <option value="Kandy">Kandy</option>
                                                <option value="Matale">Matale</option>
                                                <option value="Nuwara Eliya">Nuwara Eliya</option>
                                                <option value="Galle">Galle</option>
                                                <option value="Matara">Matara</option>
                                                <option value="Hambantota">Hambantota</option>
                                                <option value="Jaffna">Jaffna</option>
                                                <option value="Kilinochchi">Kilinochchi</option>
                                                <option value="Mannar">Mannar</option>
                                                <option value="Vavuniya">Vavuniya</option>
                                                <option value="Mullaitivu">Mullaitivu</option>
                                                <option value="Batticaloa">Batticaloa</option>
                                                <option value="Ampara">Ampara</option>
                                                <option value="Trincomalee">Trincomalee</option>
                                                <option value="Kurunegala">Kurunegala</option>
                                                <option value="Puttalam">Puttalam</option>
                                                <option value="Anuradhapura">Anuradhapura</option>
                                                <option value="Polonnaruwa">Polonnaruwa</option>
                                                <option value="Badulla">Badulla</option>
                                                <option value="Moneragala">Moneragala</option>
                                                <option value="Ratnapura">Ratnapura</option>
                                                <option value="Kegalle">Kegalle</option>
                                            </select>
                                            <p class="error-message">
                                                <?php echo $districtErr ?>
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
                                            <input type="password" placeholder="Confirm Password"
                                                name="confirm_password">
                                            <p class="error-message">
                                                <?php echo $confirmPasswordErr ?>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="signup-input one">
                                        <input type="submit" value="Create Account" name="create_account">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <footer>

            </footer>
        </div>
    </div>
    <script src="js/script.js"></script>
</body>

</html>