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
    <link rel="stylesheet" href="style/home.css">
    <link rel="stylesheet" href="style/profile-menu.css">

    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">

    <style>
        .nav-2-content-1 ul li:nth-child(1) a {
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
                <div class="seciton-content-1">
                    <div class="header">
                        <div class="header-content">
                            <img src="images/slide-1.jpg" alt="">
                            <div class="box">
                                <div class="header-content-div">
                                    <div class="header-content-left-arrow">
                                        <!-- <i class="ri-arrow-left-s-line"></i> -->
                                    </div>
                                    <div class="header-content-details">
                                        <div class="header-content-details-content">
                                            <p>
                                                Growing Together Through Sustainable Agriculture Initiatives <br>
                                                <span> Exploring Ecological Farming for a Greener Tomorrow </span>
                                            </p>
                                            <div class="header-register-button">
                                                <a href="">Register</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="header-content-right-arrow">
                                        <!-- <i class="ri-arrow-right-s-line"></i> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="header-content">
                            <img src="images/slide-2.jpg" alt="">
                            <div class="box">
                                <div class="header-content-div">
                                    <div class="header-content-left-arrow">
                                        <!-- <i class="ri-arrow-left-s-line"></i> -->
                                    </div>
                                    <div class="header-content-details">
                                        <div class="header-content-details-content">
                                            <p>
                                                Join the Green Revolution<br>  
                                                <span> Pioneering Initiatives for Eco-Friendly Agriculture in Sri Lanka </span>
                                            </p>
                                            <div class="header-register-button">
                                                <a href="signup.php">Register</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="header-content-right-arrow">
                                        <!-- <i class="ri-arrow-right-s-line"></i> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="header-content">
                            <img src="images/slide-3.jpg" alt="">
                            <div class="box">
                                <div class="header-content-div">
                                    <div class="header-content-left-arrow">
                                        <!-- <i class="ri-arrow-left-s-line"></i> -->
                                    </div>
                                    <div class="header-content-details">
                                        <div class="header-content-details-content">
                                            <p>
                                                Your Gateway to Agricultural Excellence, <br>
                                                <span> Feeding the Nation and
                                                    Protecting the Earth </span>
                                            </p>
                                            <div class="header-register-button">
                                                <a href="">Register</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="header-content-right-arrow">
                                        <!-- <i class="ri-arrow-right-s-line"></i> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="header-content">
                            <img src="images/slide-4.jpg" alt="">
                            <div class="box">
                                <div class="header-content-div">
                                    <div class="header-content-left-arrow">
                                        <!-- <i class="ri-arrow-left-s-line"></i> -->
                                    </div>
                                    <div class="header-content-details">
                                        <div class="header-content-details-content">
                                            <p>
                                                Growing for Tomorrow<br> 
                                                <span> Unite to Empower Farmers and Feed the Nation </span>
                                            </p>
                                            <div class="header-register-button">
                                                <a href="">Register</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="header-content-right-arrow">
                                        <!-- <i class="ri-arrow-right-s-line"></i> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="section-content-2">
                    <div class="box">
                        <div class="section-content-2-content">
                            <div class="section-content-2-content-1">
                                <img src="images/agricultora.jpg" alt="">
                            </div>
                            <div class="section-content-2-content-2">
                                <div class="section-header-content">
                                    <div class="top-to-bottom-line"></div>
                                    <h3>ABOUT US</h3>
                                    <h1>Cultivating Sustainability, Nurturing Farmers, Growing Sri Lanka</h1>
                                </div>
                                <div class="section-content-2-content-2-details">
                                    <p>
                                        Agriculture is the practice of cultivating crops and raising livestock to
                                        produce food, fiber, and other essential products for human survival. It
                                        encompasses a wide range of activities, from growing grains, fruits, and
                                        vegetables to raising animals for meat and dairy. Agriculture has a rich history
                                        and is fundamental to human civilization. It involves various specialized
                                        fields, such as agronomy and horticulture, and has adapted to modern
                                        technologies like precision farming. Sustainability and responsible practices
                                        are increasingly crucial to address environmental and resource challenges in
                                        agriculture.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="section-content-3">
                    <div class="box">
                        <div class="section-content-3-content">
                            <div class="section-header-content">
                                <div class="top-to-bottom-line"></div>
                                <h3>PRODUCTS</h3>
                                <h1>Bounty of the Earth: Explore DOA's <br>Agricultural Products</h1>
                            </div>
                            <div class="section-content-3-content-1">
                                <div class="section-content-3-products">

                                    <?php
                                    if ($productSql) {
                                        if (mysqli_num_rows($productSql) > 0) {

                                            $rowCount = mysqli_num_rows($productSql);

                                            for ($i = 0; $i < $rowCount; $i++) {

                                                $productRow = mysqli_fetch_array($productSql);

                                                $id = $productRow['product_id'];
                                                $title = $productRow['title'];
                                                $price = $productRow['price'];
                                                $description = $productRow["description"];
                                                $firstImage = $productRow["image_1"];

                                                echo '
                                            
                                            <a href="product.php?product-id=' . $id . '" class="product-card">
                                                <div class="product-card-image">
                                                    <img src="' . $firstImage . '" alt="">
                                                </div>
                                                <h2>' . $title . '</h2>
                                                <p>LKR. ' . $price . '</p>
                                            </a>
                                            
                                            ';

                                            }

                                        }
                                    }

                                    ?>

                                </div>
                            </div>
                            <div class="section-content-3-content-2">
                                <div>
                                    <button id="product-left-arrow"><i class="ri-arrow-left-line"></i></button>
                                    <button id="product-right-arrow"><i class="ri-arrow-right-line"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="section-content-4">
                    <div class="box">
                        <div class="section-content-4-content">
                            <div class="section-header-content">
                                <div class="top-to-bottom-line"></div>
                                <h3>NEWS & EVENTS</h3>
                                <h1>Stay Informed: DOA's Latest <br>Agricultural News and Updates</h1>
                            </div>
                            <div class="news-content">
                                <div class="news-content-1">


                                    <?php
                                    $sql = "SELECT `news_id`, `user_id`, `title`, `description`, `date`, `image` FROM `news` ORDER BY `news_id` ASC";

                                    $result = $conn->query($sql);

                                    if ($result->num_rows > 0) {

                                        $rows = $result->fetch_all(MYSQLI_ASSOC);

                                        $startRow = count($rows) - 2;
                                        $endRow = count($rows) - 1;

                                        for ($i = $endRow; $i >= $startRow; $i--) {

                                            $row = $rows[$i];

                                            $publisherId = $row['user_id'];
                                            $publisherFirstName = "";
                                            $publisherLastName = "";

                                            $sql = mysqli_query($conn, "SELECT * FROM `user` WHERE user_id = '$publisherId'");
                                            $rowa = mysqli_fetch_array($sql);
                                            if (is_array($rowa)) {
                                                $publisherFirstName = $rowa['first_name'];
                                                $publisherLastName = $rowa['last_name'];
                                            }

                                            echo '<div class="news-content-card">';
                                            echo '<a href="">';
                                            echo '<div class="news-card-image">';
                                            echo '<img src="' . $row['image'] . '" alt="">';
                                            echo '</div>';
                                            echo '<div class="news-card-details">';
                                            echo '<p class="news-card-date">' . $row['date'] . '</p>';
                                            echo '<h3>' . $row['title'] . '</h3>';
                                            echo '<p class="details">' . $row['description'] . '</p>';
                                            echo '</div>';

                                            echo '</a>';
                                            echo '</div>';

                                        }
                                    } else {
                                        echo "No results found.";
                                    }


                                    ?>


                                </div>
                                <div class="news-content-2">
                                    <button onclick="window.location.href='news.php'">Read All<i
                                            class="ri-arrow-right-line"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="section-content-5">
                    <div class="box">
                        <div class="section-content-5-content">
                            <div class="section-header-content">
                                <div class="top-to-bottom-line"></div>
                                <h3>Location</h3>
                                <h1>Find Us: DOA Office Locations Across Sri Lanka</h1>
                            </div>
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d126741.94773619437!2d79.81363655293868!3d6.928101050990104!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ae2592c99a7f567%3A0x1baf7a5090c4616d!2sDepartment%20of%20Agriculture%20WP!5e0!3m2!1sen!2slk!4v1696770325280!5m2!1sen!2slk"
                                allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                            </iframe>
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
    <script src="js/home.js"></script>
</body>

</html>