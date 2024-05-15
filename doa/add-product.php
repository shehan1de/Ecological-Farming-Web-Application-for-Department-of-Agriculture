<?php

include "database.php";
session_start();

if (!isset($_SESSION["user_id"])) {
    header("location:login.php");
} else {
    if($_SESSION['user_type'] == "farmer"){
        $userId = $_SESSION["user_id"];
    }else{
        header("location:products.php");
    }
}

$sql = mysqli_query($conn, "SELECT * FROM `user` WHERE user_id = '$userId'");
$row = mysqli_fetch_array($sql);

$image1Err = "";
$titleErr = "";
$priceErr = "";
$descriptionErr = "";

$updateId = "";
$sql = mysqli_query($conn, "SELECT * FROM `products` WHERE product_id  = '$updateId' AND user_id = '$userId'");
$update = mysqli_fetch_array($sql);

if (isset($_GET['update'])) {

    $updateId = $_GET['update'];
    $sql = mysqli_query($conn, "SELECT * FROM `products` WHERE product_id  = '$updateId' AND user_id = '$userId'");
    $update = mysqli_fetch_array($sql);

    // echo $update['image_1'];
}

if (isset($_POST['post_button'])) {

    $title = $_POST["title"];
    $price = $_POST["price"];
    $description = $_POST["description"];

    if (empty($title)) {
        $titleErr = "Enter your product title";
    }
    if (empty($price)) {
        $priceErr = "Enter your product price";
    }
    if (empty($description)) {
        $descriptionErr = "Enter your product description";
    }

    if (isset($_GET['update'])) {

        if (is_array($update)) {

            if (empty($titleErr) && empty($priceErr) && empty($descriptionErr)) {

                $title = filter_var($title, FILTER_SANITIZE_STRING);
                $price = filter_var($price, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
                $description = filter_var($description, FILTER_SANITIZE_STRING);

                if ($title && $price && $description) {
                    $stmt = mysqli_prepare($conn, "UPDATE `products` SET `title`=?, `price`=?, `description`=? WHERE `product_id`=?");

                    if ($stmt) {
                        mysqli_stmt_bind_param($stmt, "ssss", $title, $price, $description, $updateId);

                        if (mysqli_stmt_execute($stmt)) {
                            // echo $description;
                            header("location: ad-history.php");
                            exit();
                        }

                        mysqli_stmt_close($stmt);
                    }
                }
            }


        }

    } else {

        function randomNumber()
        {
            $min = 10000;
            $max = 10000000000000;
            $random_number = rand($min, $max);
            $encryptedProfileLink = md5($random_number);
            return $encryptedProfileLink;
        }

        $imagePaths = [];

        for ($i = 1; $i <= 5; $i++) {
            if (isset($_FILES["image-$i"]) && $_FILES["image-$i"]["error"] == 0) {
                $extension = pathinfo($_FILES["image-$i"]["name"], PATHINFO_EXTENSION);
                $folder = "images/product-images/" . randomNumber() . "." . $extension;

                if (move_uploaded_file($_FILES["image-$i"]["tmp_name"], $folder)) {
                    $imagePaths[] = $folder;
                }
            } else {
                $imagePaths[] = 'null';
            }
        }

        if (
            count(array_filter($imagePaths, function ($path) {
                return $path !== 'null';
            })) === 0
        ) {
            $image1Err = "Please select at least one image";
        }

        if (empty($titleErr) && empty($priceErr) && empty($descriptionErr) && empty($image1Err)) {
            $stmt = mysqli_prepare($conn, "INSERT INTO `products` (`user_id`, `title`, `price`, `description`, `image_1`, `image_2`, `image_3`, `image_4`, `image_5`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");

            if ($stmt) {
                mysqli_stmt_bind_param($stmt, "ssdssssss", $userId, $title, $price, $description, $imagePaths[0], $imagePaths[1], $imagePaths[2], $imagePaths[3], $imagePaths[4]);

                if (mysqli_stmt_execute($stmt)) {
                    header("location: ad-history.php");
                }

                mysqli_stmt_close($stmt);
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
    <link rel="stylesheet" href="style/add-product.css">
    <link rel="stylesheet" href="style/profile-menu.css">

    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">

    <style>
        .nav-2-content-1 ul li:nth-child(3) a {
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
                <form class="box" method="POST" enctype="multipart/form-data">
                    <div class="add-product">
                        <div class="product-content-1">
                            <h3>Fill in the details</h3>
                            <div class="product-details">
                                <input type="text" placeholder="Enter your item title" name="title" value="<?php
                                if (is_array($update)) {
                                    echo $update['title'];
                                }
                                ?>">
                                <p class="error-message">
                                    <?php echo $titleErr ?>
                                </p>
                                <input type="number" placeholder="Price" name="price" value="<?php

                                if (is_array($update)) {
                                    echo $update['price'];
                                }
                                ?>">
                                <p class="error-message">
                                    <?php echo $priceErr ?>
                                </p>
                                <textarea placeholder="Description" name="description"><?php
                                if (is_array($update)) {
                                    echo $update['description'];
                                }
                                ?></textarea>
                                <p class="error-message">
                                    <?php echo $descriptionErr ?>
                                </p>
                            </div>
                            <h3 style="margin-top: 40px;">Add up to 5 photos</h3>
                            <div class="product-images">
                                <div class="product-file-input">
                                    <input type="file" class="file-input" name="image-1">
                                    <input type="file" class="file-input" name="image-2">
                                    <input type="file" class="file-input" name="image-3">
                                    <input type="file" class="file-input" name="image-4">
                                    <input type="file" class="file-input" name="image-5">
                                </div>
                                <ul>
                                    <li>
                                        <div class="product-image-selector">
                                            <div class="product-image-content">
                                                <i class="ri-image-line"></i>
                                                <p>Add a photo</p>
                                            </div>
                                            <div class="product-image-photo">
                                                <img src="<?php
                                                if (is_array($update)) {
                                                    if ($update['image_1'] == "null") {
                                                        echo "images/white.jpg";
                                                    } else {
                                                        echo $update['image_1'];
                                                    }
                                                } else {
                                                    echo "images/white.jpg";
                                                }
                                                ?>">
                                            </div>
                                        </div>
                                    </li>

                                    <li>
                                        <div class="product-image-selector">
                                            <div class="product-image-content">
                                                <i class="ri-image-line"></i>
                                                <p>Add a photo</p>
                                            </div>
                                            <div class="product-image-photo">
                                                <img src="<?php
                                                if (is_array($update)) {
                                                    if ($update['image_2'] == "null") {
                                                        echo "images/white.jpg";
                                                    } else {
                                                        echo $update['image_2'];
                                                    }
                                                } else {
                                                    echo "images/white.jpg";
                                                }
                                                ?>">
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="product-image-selector">
                                            <div class="product-image-content">
                                                <i class="ri-image-line"></i>
                                                <p>Add a photo</p>
                                            </div>
                                            <div class="product-image-photo">
                                                <img src="<?php
                                                if (is_array($update)) {
                                                    if ($update['image_3'] == "null") {
                                                        echo "images/white.jpg";
                                                    } else {
                                                        echo $update['image_3'];
                                                    }
                                                } else {
                                                    echo "images/white.jpg";
                                                }
                                                ?>">
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="product-image-selector">
                                            <div class="product-image-content">
                                                <i class="ri-image-line"></i>
                                                <p>Add a photo</p>
                                            </div>
                                            <div class="product-image-photo">
                                                <img src="<?php
                                                if (is_array($update)) {
                                                    if ($update['image_4'] == "null") {
                                                        echo "images/white.jpg";
                                                    } else {
                                                        echo $update['image_4'];
                                                    }
                                                } else {
                                                    echo "images/white.jpg";
                                                }
                                                ?>">
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="product-image-selector">
                                            <div class="product-image-content">
                                                <i class="ri-image-line"></i>
                                                <p>Add a photo</p>
                                            </div>
                                            <div class="product-image-photo">
                                                <img src="<?php
                                                if (is_array($update)) {
                                                    if ($update['image_5'] == "null") {
                                                        echo "images/white.jpg";
                                                    } else {
                                                        echo $update['image_5'];
                                                    }
                                                } else {
                                                    echo "images/white.jpg";
                                                }
                                                ?>">
                                            </div>
                                        </div>
                                    </li>
                                </ul>

                            </div>
                            <p class="error-message">
                                <?php echo $image1Err ?>
                            </p>
                        </div>
                        <div class="product-content-2">
                            <h3>Contact details</h3>
                            <div class="product-contact">
                                <p>Name</p>
                                <p>
                                    <?php
                                    if (is_array($row)) {
                                        echo $row['first_name'];
                                        echo " ";
                                        echo $row['last_name'];
                                    }
                                    ?>
                                </p>
                            </div>
                            <div class="product-contact">
                                <p>Email</p>
                                <p>
                                    <?php
                                    if (is_array($row)) {
                                        echo $row['email'];
                                    }
                                    ?>
                                </p>
                            </div>
                            <div class="product-contact">
                                <p>Phone Number</p>
                                <p>
                                    <?php
                                    if (is_array($row)) {
                                        echo $row['phone_number'];
                                    }
                                    ?>
                                </p>
                            </div>
                            <div class="product-contact">
                                <p>Address</p>
                                <p>
                                    <?php
                                    if (is_array($row)) {
                                        echo $row['address'];
                                    }
                                    ?>
                                </p>
                            </div>
                        </div>

                    </div>
                    <div class="add-button">
                        <input type="submit" value="Post ad" name="post_button">
                    </div>
                </form>
            </section>
        </div>
        <?php
        include "footer.php"
            ?>
    </div>
    <script src="js/script.js"></script>
    <script src="js/add-product.js"></script>
</body>

</html>