<?php

include "database.php";
session_start();

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
    <link rel="stylesheet" href="style/consulting.css">
    <link rel="stylesheet" href="style/profile-menu.css">

    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">

    <style>
        .nav-2-content-1 ul li:nth-child(8) a {
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
                    <div class="news-content">


                        <?php
                        $sql = "SELECT `consulting_id`, `user_id`, `title`, `description`, `date`, `image` FROM `consulting`";

                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {

                            $rows = $result->fetch_all(MYSQLI_ASSOC);

                            $startRow = 0;
                            $endRow = count($rows) - 1;

                            for ($i = $endRow; $i >= $startRow; $i--) {
                                $row = $rows[$i];
                                $publisherId = $row['user_id'];
                                $publisherFirstName = "";
                                $publisherLastName = "";


                                $sql = mysqli_query($conn, "SELECT * FROM `user` WHERE user_id = '$publisherId'");
                                $rowa = mysqli_fetch_array($sql);
                                if (is_array($row)) {
                                    $publisherFirstName = $rowa['first_name'];
                                    $publisherLastName = $rowa['last_name'];
                                }
                                
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
                                <img src="images/agricultora.jpg" alt="">
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
                        </a>
                        
                     -->

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