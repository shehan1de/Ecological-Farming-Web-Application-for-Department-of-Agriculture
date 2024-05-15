<?php

include "database.php";
session_start();

// $newsSql = mysqli_query($conn, "SELECT * FROM `news` WHERE 1 ORDER BY news_id DESC");


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
    <link rel="stylesheet" href="style/news.css">
    <link rel="stylesheet" href="style/profile-menu.css">

    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">

    <style>
        .nav-2-content-1 ul li:nth-child(4) a {
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
                    <div class="news-header">
                        <a href="" class="news-header-content-1">
                            <div class="news-header-image">
                                <img src="
                                <?php
                                   $sql = "SELECT * FROM `news` ORDER BY `news_id` DESC LIMIT 1";
                                   $result = $conn->query($sql);
                                   if ($result->num_rows > 0) {
                                       $row = $result->fetch_assoc();
                                       echo $row["image"];
                                   }
                                    ?>
                                " alt="">
                            </div>
                            <div class="news-header-detials">
                                <h3>
                                    <?php
                                   $sql = "SELECT * FROM `news` ORDER BY `news_id` DESC LIMIT 1";
                                   $result = $conn->query($sql);
                                   if ($result->num_rows > 0) {
                                       $row = $result->fetch_assoc();
                                       echo $row["title"];
                                   }
                                    ?>
                                </h3>
                            </div>
                        </a>
                        <div class="news-header-content-2">
                            <div class="section-header-content">
                                <div class="top-to-bottom-line"></div>
                                <h3 style="margin-bottom: 20px;">LATEST NEWS</h3>
                            </div>
                            <div class="news-header-small-content-1">
                                <a href="" class="news-small first">
                                    <div class="news-small-content-1">
                                        <img src="
                                        <?php
                                            $sql = "SELECT * FROM `news` ORDER BY `news_id` DESC LIMIT 1 OFFSET 1";
                                            $result = $conn->query($sql);
                                            
                                            if ($result->num_rows > 0) {
                                                $row = $result->fetch_assoc();
                                                echo $row["image"];
                                            }
                                            ?>" alt="">
                                    </div>
                                    <div class="news-small-content-2">
                                        <p>
                                            <?php
                                            $sql = "SELECT * FROM `news` ORDER BY `news_id` DESC LIMIT 1 OFFSET 1";
                                            $result = $conn->query($sql);
                                            
                                            if ($result->num_rows > 0) {
                                                $row = $result->fetch_assoc();
                                                echo $row["title"];
                                            }
                                            ?>
                                        </p>
                                    </div>
                                </a>
                                <a href="" class="news-small">
                                    <div class="news-small-content-1">
                                        <img src="<?php
                                            $sql = "SELECT * FROM `news` ORDER BY `news_id` DESC LIMIT 1 OFFSET 2";
                                            $result = $conn->query($sql);
                                            
                                            if ($result->num_rows > 0) {
                                                $row = $result->fetch_assoc();
                                                echo $row["image"];
                                            }
                                            
                                            ?>" alt="">
                                    </div>
                                    <div class="news-small-content-2">
                                        <p>
                                            <?php
                                            $sql = "SELECT * FROM `news` ORDER BY `news_id` DESC LIMIT 1 OFFSET 2";
                                            $result = $conn->query($sql);
                                            
                                            if ($result->num_rows > 0) {
                                                $row = $result->fetch_assoc();
                                                echo $row["title"];
                                            }
                                            
                                            ?>
                                        </p>
                                    </div>
                                </a>
                            </div>
                            <div class="news-header-small-content-2">
                                <a href="" class="news-small">
                                    <div class="news-small-content-1">
                                        <img src="<?php
                                            $sql = "SELECT * FROM `news` ORDER BY `news_id` DESC LIMIT 1 OFFSET 3";
                                            $result = $conn->query($sql);
                                            
                                            if ($result->num_rows > 0) {
                                                $row = $result->fetch_assoc();
                                                echo $row["image"];
                                            }
                                            
                                            ?>" alt="">
                                    </div>
                                    <div class="news-small-content-2">
                                        <p><?php
                                            $sql = "SELECT * FROM `news` ORDER BY `news_id` DESC LIMIT 1 OFFSET 3";
                                            $result = $conn->query($sql);
                                            
                                            if ($result->num_rows > 0) {
                                                $row = $result->fetch_assoc();
                                                echo $row["title"];
                                            }
                                            
                                            ?>
                                        </p>
                                    </div>
                                </a>
                                <a href="" class="news-small">
                                    <div class="news-small-content-1">
                                        <img src="
                                        <?php
                                            $sql = "SELECT * FROM `news` ORDER BY `news_id` DESC LIMIT 1 OFFSET 4";
                                            $result = $conn->query($sql);
                                            
                                            if ($result->num_rows > 0) {
                                                $row = $result->fetch_assoc();
                                                echo $row["image"];
                                            }
                                            
                                            ?>" alt="">
                                    </div>
                                    <div class="news-small-content-2">
                                        <p>
                                        <?php
                                            $sql = "SELECT * FROM `news` ORDER BY `news_id` DESC LIMIT 1 OFFSET 4";
                                            $result = $conn->query($sql);
                                            
                                            if ($result->num_rows > 0) {
                                                $row = $result->fetch_assoc();
                                                echo $row["title"];
                                            }
                                            
                                            ?>
                                        </p>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <hr style="margin-top: 40px;">
                    <div class="news-content">
                        <div class="section-header-content">
                            <div class="top-to-bottom-line"></div>
                            <h3 style="margin-bottom: 20px;">OLD NEWS</h3>
                        </div>

                        <?php
                        $sql = "SELECT `news_id`, `user_id`, `title`, `description`, `date`, `image` FROM `news` ORDER BY `news_id` DESC";

                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {

                            $rows = $result->fetch_all(MYSQLI_ASSOC);

                            $startRow = 5;
                            $endRow = count($rows) - 1;

                            for ($i = $startRow; $i <= $endRow; $i++) {

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


                        ?>


                        <!-- <a href="" class="news-medium">
                            <div class="news-medium-content-1">
                                <img src="images/slide-2.jpg" alt="">
                            </div>
                            <div class="news-medium-content-2">
                                <h3>Lorem ipsum dolor sit amet consectetur adipisicing elit.consectetur adipisicing elit
                                    Similique officia facere
                                </h3>
                                <p>
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi aut eveniet magni
                                    repellat ullam aliquam dolorum officia laudantium, excepturi error illo cum
                                    reprehenderit doloremque facere, amet ex quod modi sed?
                                </p>
                                <div class="news-medium-date">
                                    <p>by Nadeesha Jayawickrama - July 30, 2023</p>
                                </div>
                            </div>
                        </a> -->



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