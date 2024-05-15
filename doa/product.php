<?php

include "database.php";
session_start();

$productPublisher = "";
$productId = "";

if (isset($_GET['product-id'])) {

    $productId = $_GET['product-id'];

    $productSql = mysqli_query($conn, "SELECT * FROM `products` WHERE product_id = '$productId'");
    $productRow = mysqli_fetch_array($productSql);
    if (is_array($productRow)) {

        $productUserId = $productRow['user_id'];

        $sql = mysqli_query($conn, "SELECT * FROM `user` WHERE user_id = '$productUserId'");
        $productPublisher = mysqli_fetch_array($sql);

    } else {
        header("location:products.php");
    }
}else{
    header("location:products.php");
}

if (isset($_SESSION["user_type"])) {
    if ($_SESSION["user_type"] == "admin") {
        if (isset($_GET['delete'])) {

            $deleteId = $_GET['delete'];

            $sql = "DELETE FROM products WHERE product_id  = '$deleteId'";

            if (mysqli_query($conn, $sql)) {
                header("location:products.php");
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
    <link rel="stylesheet" href="style/product.css">
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
                <div class="box">
                    <div class="section-header-content">
                        <div class="top-to-bottom-line"></div>
                        <h1>
                            <?php
                            if (is_array($productRow)) {
                                echo $productRow['title'];
                            }
                            ?>

                        </h1>
                    </div>
                    <div class="product-content">

                        <div class="product-content-1">
                            <img src=" <?php
                            if (is_array($productRow)) {
                                if ($productRow['image_1'] == "null") {
                                    $firstImage = '';
                                } else {
                                    $firstImage = $productRow["image_1"];
                                    echo "$firstImage";
                                }
                            }
                            ?>
                            " alt="" id="product-image">
                        </div>
                        <div class="product-content-2">
                            <div class="left-arrow">
                                <i class="ri-arrow-left-s-line" id="product-left-arrow"></i>
                            </div>
                            <div class="product-content-ul">
                                <ul>
                                    <?php

                                    if (is_array($productRow)) {
                                        if ($productRow['image_1'] == "null") {
                                            $firstImage = '';
                                        } else {
                                            $firstImage = $productRow["image_1"];
                                            echo '
                                                    <li>
                                                        <img src="' . $firstImage . '" alt="" class="product-images">
                                                    </li>
                                                ';
                                        }
                                    }
                                    ?>
                                    <?php

                                    if (is_array($productRow)) {
                                        if ($productRow['image_2'] == "null") {
                                            $firstImage = '';
                                        } else {
                                            $firstImage = $productRow["image_2"];
                                            echo '
                                                <li>
                                                    <img src="' . $firstImage . '" alt="" class="product-images">
                                                </li>
                                            ';
                                        }
                                    }
                                    ?>
                                    <?php

                                    if (is_array($productRow)) {
                                        if ($productRow['image_3'] == "null") {
                                            $firstImage = '';
                                        } else {
                                            $firstImage = $productRow["image_3"];
                                            echo '
                                                <li>
                                                    <img src="' . $firstImage . '" alt="" class="product-images">
                                                </li>
                                            ';
                                        }
                                    }
                                    ?>
                                    <?php

                                    if (is_array($productRow)) {
                                        if ($productRow['image_4'] == "null") {
                                            $firstImage = '';
                                        } else {
                                            $firstImage = $productRow["image_4"];
                                            echo '
                                                <li>
                                                    <img src="' . $firstImage . '" alt="" class="product-images">
                                                </li>
                                            ';
                                        }
                                    }
                                    ?>
                                    <?php

                                    if (is_array($productRow)) {
                                        if ($productRow['image_5'] == "null") {
                                            $firstImage = '';
                                        } else {
                                            $firstImage = $productRow["image_5"];
                                            echo '
                                                <li>
                                                    <img src="' . $firstImage . '" alt="" class="product-images">
                                                </li>
                                            ';
                                        }
                                    }
                                    ?>
                                </ul>
                            </div>
                            <div class="right-arrow">
                                <i class="ri-arrow-right-s-line" id="product-right-arrow"></i>
                            </div>
                        </div>
                    </div>
                    <div class="product-detials">
                        <div class="product-detials-content-1">
                            <h1>Rs
                                <?php
                                if (is_array($productRow)) {
                                    echo $productRow['price'];
                                }
                                ?>
                            </h1>
                            <div class="contact-details">
                                <p>Phone Number :
                                    <span>
                                        <a href="">
                                            <?php
                                            if (is_array($productPublisher)) {
                                                echo $productPublisher['phone_number'];
                                            }
                                            ?>
                                        </a>
                                    </span>
                                </p>
                                <p>Email Address : <span>
                                        <a href="">
                                            <?php
                                            if (is_array($productPublisher)) {
                                                echo $productPublisher['email'];
                                            }
                                            ?>
                                        </a>
                                    </span></p>
                                <p>Address :
                                    <span>
                                        <?php
                                        if (is_array($productPublisher)) {
                                            echo $productPublisher['address'];
                                        }
                                        ?>
                                    </span>
                                </p>

                            </div>
                            <div class="section-header-content" style="margin-top: 20px;">
                                <div class="top-to-bottom-line"></div>
                                <h3>Description</h3>
                            </div>
                            <p>
                                <?php
                                if (is_array($productRow)) {
                                    echo $productRow['description'];
                                }
                                ?>
                            </p>

                            <?php

                            if (isset($_SESSION["user_type"])) {
                                if ($_SESSION["user_type"] == "admin") {

                                    echo '
                                        <div class="delete-and-edit">
                                            <div class="delete"
                                            onclick="window.location.href=\'product.php?product-id=echo $productId;&delete=echo $productId;\'">
                                                <i class="ri-delete-bin-6-line"></i></div>
                                        </div>
                                    ';

                                }
                            }

                            ?>
                            <!-- <div class='delete'
                                onclick="window.location.href='product.php?product-id=<?php echo $productId; ?>&delete=<?php echo $productId; ?>'">
                                <i class="ri-delete-bin-6-line"></i>
                            </div> -->

                        </div>
                        <div class="product-detials-content-2">

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
    <script src="js/product.js"></script>
</body>

</html>