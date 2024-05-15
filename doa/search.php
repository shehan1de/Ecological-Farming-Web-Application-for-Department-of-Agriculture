<?php

include "database.php";
session_start();

// $productSql = mysqli_query($conn, "SELECT * FROM `products` WHERE 1 ORDER BY product_id DESC");
// $coursesSql = mysqli_query($conn, "SELECT * FROM `courses` WHERE 1 ORDER BY course_id DESC");

$search = "";
if (isset($_GET['search'])) {
    $search = $_GET['search'];
} else {
    header("location:index.php");
}

if (isset($_GET['pcn'])) {
} else {
    header("location:search.php?search=$search&pcn=product");
}

$productSql = mysqli_query($conn, "SELECT * FROM `products` WHERE `title` LIKE '%" . $search . "%' ORDER BY `product_id` DESC");
$coursesSql = mysqli_query($conn, "SELECT * FROM `courses` WHERE `title` LIKE '%" . $search . "%' ORDER BY `course_id` DESC");

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
    <link rel="stylesheet" href="style/search.css">
    <link rel="stylesheet" href="style/profile-menu.css">

    <link rel="stylesheet" href="style/products.css">
    <link rel="stylesheet" href="style/courses.css">
    <link rel="stylesheet" href="style/news.css">

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
                    <div class="search-content">
                        <div class="search-header">
                            <div class="search-header-content-1   <?php
                            if (isset($_GET['pcn'])) {
                                if ($_GET['pcn'] == "product") {
                                    echo 'search-header-border';
                                }
                            } ?>"
                                onclick="window.location.href='search.php?search=<?php echo $search; ?>&pcn=product'">
                                <p>Products</p>
                            </div>
                            <div class="search-header-content-2 <?php
                            if (isset($_GET['pcn'])) {
                                if ($_GET['pcn'] == "courses") {
                                    echo 'search-header-border';
                                }
                            } ?>"
                                onclick="window.location.href='search.php?search=<?php echo $search; ?>&pcn=courses'">
                                <p>Coursers</p>
                            </div>
                            <div class="search-header-content-3 <?php
                            if (isset($_GET['pcn'])) {
                                if ($_GET['pcn'] == "news") {
                                    echo 'search-header-border';
                                }
                            } ?>" onclick="window.location.href='search.php?search=<?php echo $search; ?>&pcn=news'">
                                <p>News</p>
                            </div>
                        </div>

                        <div class="search-products">

                            <?php
                            if (isset($_GET['pcn'])) {
                                if ($_GET['pcn'] == "product") {
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
                                                                <div class="product-card" onclick="window.location.href=\'product.php?product-id=' . $id . '\'">
                                                                    <img src=' . $firstImage . ' alt="">
                                                                    <h3>' . $title . '</h3>
                                                                    <p>' . 'LKR.' . $price . '</p>
                                                                    
                                                                </div>
                                                            ';

                                                            } elseif ($i == 1) {
                                                                echo '
                                                            <div class="product-card" onclick="window.location.href=\'product.php?product-id=' . $id . '\'">
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
                                                                <div class="product-card" onclick="window.location.href=\'product.php?product-id=' . $id . '\'">
                                                                    <img src=' . $firstImage . ' alt="">
                                                                    <h3>' . $title . '</h3>
                                                                    <p>' . 'LKR.' . $price . '</p>
                                                                </div>
                                                        ';
                                                            } elseif ($i == 3) {
                                                                echo '
                                                                <div class="product-card" onclick="window.location.href=\'product.php?product-id=' . $id . '\'">
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
                                }
                            }
                            ?>



                        </div>

                        <div class="search-courses">

                            <?php

                            if (isset($_GET['pcn'])) {
                                if ($_GET['pcn'] == "courses") {

                                    if ($coursesSql) {
                                        if (mysqli_num_rows($coursesSql) > 0) {

                                            $rowCount = mysqli_num_rows($coursesSql);
                                            $breakOuterLoop = false;

                                            // echo $rowCount % 4;
                            
                                            for ($g = 0; $g < $rowCount; $g++) {

                                                echo '<div class="course-content">';

                                                $n = true;

                                                for ($i = 0; $i < 4; $i++) {

                                                    $coursesRow = mysqli_fetch_array($coursesSql);

                                                    if ($coursesRow && !empty($coursesRow['course_id'])) {

                                                        $id = $coursesRow['course_id'];
                                                        $title = $coursesRow['title'];
                                                        $description = $coursesRow["description"];
                                                        $date = $coursesRow['date'];
                                                        $image = $coursesRow["image"];
                                                        $duration = $coursesRow['duration'];

                                                        if ($n == true) {

                                                            if ($i == 0) {

                                                                echo '
                                                            <div class="course-contnet-1">
                                                                <div class="course-card" onclick="window.location.href=\'course.php?course-id=' . $id . '\'">
                                                                    <img src=' . $image . ' alt="">
                                                                    <h3>' . $title . '</h3>
                                                                    <p>' . $duration . '</p>
                                                                    
                                                                </div>
                                                            ';

                                                            } elseif ($i == 1) {
                                                                echo '
                                                            <div class="course-card" onclick="window.location.href=\'course.php?course-id=' . $id . '\'">
                                                                <img src=' . $image . ' alt="">
                                                                <h3>' . $title . '</h3>
                                                                <p>' . $duration . '</p>
                                                                
                                                            </div>
                                                        </div>
                                                    ';

                                                                $n = false;
                                                            }

                                                        } else {

                                                            if ($i == 2) {
                                                                echo '
                                                            <div class="course-contnet-2">
                                                                <div class="course-card" onclick="window.location.href=\'course.php?course-id=' . $id . '\'">
                                                                    <img src=' . $image . ' alt="">
                                                                    <h3>' . $title . '</h3>
                                                                    <p>' . $duration . '</p>
                                                                </div>
                                                        ';
                                                            } elseif ($i == 3) {
                                                                echo '
                                                                <div class="course-card" onclick="window.location.href=\'course.php?course-id=' . $id . '\'">
                                                                    <img src=' . $image . ' alt="">
                                                                    <h3>' . $title . '</h3>
                                                                    <p>' . $duration . '</p>
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
                                }
                            }
                            ?>





                        </div>

                        <div class="search-news">

                            <?php

                            if (isset($_GET['pcn'])) {
                                if ($_GET['pcn'] == "news") {
                                    $sql = "SELECT `news_id`, `user_id`, `title`, `description`, `date`, `image` FROM `news` WHERE `title` LIKE '%" . $search . "%'";

                                    $result = $conn->query($sql);

                                    if ($result->num_rows > 0) {

                                        $rows = $result->fetch_all(MYSQLI_ASSOC);

                                        $startRow = 0;
                                        $endRow = count($rows) - 1;

                                        for ($i = $endRow; $i >= $startRow; $i--) {

                                            $publisherId = $row['user_id'];
                                            $publisherFirstName = "";
                                            $publisherLastName = "";


                                            $sql = mysqli_query($conn, "SELECT * FROM `user` WHERE user_id = '$publisherId'");
                                            $row = mysqli_fetch_array($sql);
                                            if (is_array($row)) {
                                                $publisherFirstName = $row['first_name'];
                                                $publisherLastName = $row['last_name'];
                                            }
                                            $row = $rows[$i];
                                            echo '<a href="#" class="news-medium">';
                                            echo '<div class="news-medium-content-1">';
                                            echo '<img src="' . $row['image'] . '" alt="">';
                                            echo '</div>';
                                            echo '<div class="news-medium-content-2">';
                                            echo '<h3>' . $row['title'] . '</h3>';
                                            echo '<p>' . $row['description'] . '</p>';
                                            echo '<div class="news-medium-date">';
                                            echo '<p>by ' . $publisherFirstName . ' ' . $publisherLastName . ' - ' . $row['date'] . '</p>';
                                            echo '</div>';
                                            echo '</div>';
                                            echo '</a>';
                                        }
                                    } else {
                                        echo "No results found.";
                                    }

                                }
                            }
                            ?>

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