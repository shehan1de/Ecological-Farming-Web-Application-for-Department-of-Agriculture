<?php

include "database.php";
session_start();

$userId = '';

if (!isset($_SESSION["user_id"])) {
    header("location:login.php");
} else {

    if ($_SESSION['user_type'] == "farmer") {
        $userId = $_SESSION["user_id"];
    } else {
        header("location:profile.php");
    }

}

$sql = mysqli_query($conn, "SELECT * FROM `user` WHERE user_id = '$userId'");
$row = mysqli_fetch_array($sql);


$productSql = mysqli_query($conn, "SELECT * FROM `products` WHERE user_id = '$userId' ORDER BY product_id DESC");

if (isset($_GET['delete'])) {

    $deleteId = $_GET['delete'];

    $sql = mysqli_query($conn, "SELECT * FROM `products` WHERE product_id  = '$deleteId' AND user_id = '$userId'");
    $row = mysqli_fetch_array($sql);
    if (is_array($row)) {

        $sql = "DELETE FROM products WHERE product_id  = '$deleteId'";

        if (mysqli_query($conn, $sql)) {
            header("location:ad-history.php");
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
    <link rel="stylesheet" href="style/ad-history.css">
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
                <div class="box">
                    <div class="history-contnet">
                        <table>
                            <tr>
                                <th>Product ID</th>
                                <th>Product</th>
                                <th>Title</th>
                                <th>Price</th>
                                <th></th>
                            </tr>
                            <?php
                            if ($productSql) {
                                if (mysqli_num_rows($productSql) > 0) {
                                    while ($productRow = mysqli_fetch_array($productSql)) {

                                        $id = $productRow['product_id'];
                                        $title = $productRow['title'];
                                        $price = $productRow['price'];
                                        $description = $productRow["description"];
                                        $firstImage = $productRow["image_1"];

                                        echo "
                                        <tr>
                                            <td>$id</td>
                                            <td>
                                                <img src='$firstImage' alt=''>
                                            </td>
                                            <td>$title</td>
                                            <td>$price</td>
                                            <td>
                                                <div class='edit-delete'>
                                                   <a href='add-product.php?update=$id' > <button style='background:green'><i class='ri-edit-line'></i></button></a>
                                                   <a href='ad-history.php?delete=$id'><button><i class='ri-delete-bin-6-line'></i></button></a>
                                                </div>
                                            </td>
                                        </tr>
                                    ";
                                    }
                                }
                            }
                            ?>

                        </table>
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