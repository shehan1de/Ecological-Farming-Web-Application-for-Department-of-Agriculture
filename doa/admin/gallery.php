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

$titleErr = "";
$descriptionErr = "";
$imageErr = "";

if (isset($_POST["add_gallery"])) {

    $title = $_POST["title"];
    $description = $_POST["description"];
    // $image = $_POST["image"];

    if (empty($title)) {
        $titleErr = "Please enter title";
    }
    if (empty($description)) {
        $descriptionErr = "Please enter description";
    }

    $file_name = $_FILES["image"]["name"];
    $file_temp = $_FILES["image"]["tmp_name"];
    $file_size = $_FILES["image"]["size"];
    $file_type = $_FILES["image"]["type"];
    $file_error = $_FILES["image"]["error"];

    $min = 10000;
    $max = 10000000000000;
    $random_number = rand($min, $max);
    $encryptedProfileLink = md5($random_number);

    $extension = pathinfo($file_name, PATHINFO_EXTENSION);
    $folder = "images/gallery/" . $encryptedProfileLink . "." . $extension;

    if (empty($extension)) {
        $imageErr = "Please select a image";
    }

    $date = date("F j, Y");

    // 

    if (empty($title)) {
    } elseif (empty($description)) {
    } elseif (empty($extension)) {
    } else {


        $stmt = mysqli_prepare($conn, "INSERT INTO `gallery` (`user_id`,`title`, `description`, `date`,`image`) VALUES (?,?, ?, ?,?)");

        if ($stmt) {

            mysqli_stmt_bind_param($stmt, "sssss",$userId, $title, $description, $date, $folder);

            if (mysqli_stmt_execute($stmt)) {
                
                if (!$file_error > 0) {
                    move_uploaded_file($file_temp, '../'.$folder);
                    header("location:gallery.php?success=true");
                }
            }

            mysqli_stmt_close($stmt);
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
                        <div class="menu-item " onclick="window.location.href ='index.php'">
                            <i class="ri-user-add-line"></i>
                            <p>Create Admin</p>
                        </div>
                        <div class="menu-item" onclick="window.location.href ='feild-officer.php'">
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
                        <div class="menu-item active"  onclick="window.location.href ='gallery.php'">
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
                            <form class="signup-box" method="POST" enctype="multipart/form-data">
                                <?php
                                if (isset($_GET['success'])) {
                                    echo '
                                        <div class="header-error-message">
                                            <p>Gallery added successful</p>
                                        </div>
                                    ';
                                }
                                ?>
                                <div class="signup-input">
                                    <div class="signup-content-1 one">
                                        <img src="../images/upload.webp" alt="" id="news-img">
                                        <input type="file" id="input-file" name="image" style="visibility:hidden;">
                                    </div>
                                </div>
                                <p class="error-message">
                                    <?php echo $imageErr ?>
                                </p>

                                <div class="signup-input">
                                    <div class="signup-content-1 one">
                                        <input type="text" placeholder="Title" name="title">
                                        <p class="error-message">
                                            <?php echo $titleErr ?>
                                        </p>
                                    </div>
                                </div>
                                <div class="signup-input">
                                    <div class="signup-content-1 textarea">
                                        <textarea placeholder="Description" name="description"></textarea>
                                        <p class="error-message">
                                            <?php echo $descriptionErr ?>
                                        </p>
                                    </div>
                                </div>
                                <div class="signup-input one">
                                    <input type="submit" value="Add Gallery" name="add_gallery">
                                </div>
                            </form>
                        </div>
                    </div>
                
                </div>
            </section>
            <footer>

            </footer>
        </div>
    </div>
    <script src="js/script.js"></script>
    <script src="js/news.js"></script>
</body>

</html>