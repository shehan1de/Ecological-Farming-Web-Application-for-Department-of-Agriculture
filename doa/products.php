<?php

include "database.php";
session_start();

$productSql = mysqli_query($conn, "SELECT * FROM `products` WHERE 1 ORDER BY product_id DESC");

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
    <link rel="stylesheet" href="style/products.css">
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
                <div class="products">
                    <div class="box">
                        <div class="product-header">
                            <div class="product-header-content-2">
                                <button onclick="window.location.href='add-product.php'">POST YOUR AD</button>
                            </div>
                        </div>

                        <?php

                        if ($productSql) {
                            if (mysqli_num_rows($productSql) > 0) {

                                $rowCount = mysqli_num_rows($productSql);
                                $breakOuterLoop = false;

                                // echo $rowCount % 4;

                                for ($g = 0; $g < $rowCount; $g++) {

                                    echo '<div class="products-content">';

                                    $n = true;

                                    for ($i = 0; $i < 4; $i++) {

                                        $productRow = mysqli_fetch_array($productSql);

                                        if ($productRow && !empty($productRow['product_id'])) {

                                            $id = $productRow['product_id'];
                                            $title = $productRow['title'];
                                            $price = $productRow['price'];
                                            $description = $productRow["description"];
                                            $firstImage = $productRow["image_1"];

                                            if ($n == true) {

                                                if ($i == 0) {

                                                    echo '
                                                    <div class="product-content-1">
                                                        <div class="product-card" onclick="window.location.href=\'product.php?product-id='.$id.'\'">
                                                            <img src=' . $firstImage . ' alt="">
                                                            <h3>' . $title . '</h3>
                                                            <p>' . 'LKR.' . $price . '</p>
                                                            
                                                        </div>
                                                    ';

                                                } elseif ($i == 1) {
                                                    echo '
                                                        <div class="product-card" onclick="window.location.href=\'product.php?product-id='.$id.'\'">
                                                            <img src=' . $firstImage . ' alt="">
                                                            <h3>' . $title . '</h3>
                                                            <p>' . 'LKR.' . $price . '</p>
                                                            
                                                        </div>
                                                    </div>
                                                ';

                                                    $n = false;
                                                }

                                            } else {

                                                if ($i == 2) {
                                                    echo '
                                                    <div class="product-content-2">
                                                        <div class="product-card" onclick="window.location.href=\'product.php?product-id='.$id.'\'">
                                                            <img src=' . $firstImage . ' alt="">
                                                            <h3>' . $title . '</h3>
                                                            <p>' . 'LKR.' . $price . '</p>
                                                        </div>
                                                ';
                                                } elseif ($i == 3) {
                                                    echo '
                                                    <div class="product-card" onclick="window.location.href=\'product.php?product-id='.$id.'\'">
                                                        <img src=' . $firstImage . ' alt="">
                                                        <h3>' . $title . '</h3>
                                                        <p>' . 'LKR.' . $price . '</p>
                                                    </div>
                                                </div>
                                        ';
                                                    $n = true;
                                                }

                                            }

                                        } else {
                                            echo '</div>';
                                            $breakOuterLoop = true;
                                            break;
                                        }

                                    }
                                    echo '</div>';

                                    if ($breakOuterLoop) {
                                        break;
                                    }

                                }

                            }
                        }

                        ?>


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