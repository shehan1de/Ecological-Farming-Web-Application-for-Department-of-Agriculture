<?php

include "database.php";
session_start();

$coursesSql = mysqli_query($conn, "SELECT * FROM `courses` WHERE 1 ORDER BY course_id DESC");

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
    <link rel="stylesheet" href="style/courses.css">
    <link rel="stylesheet" href="style/profile-menu.css">

    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">

    <style>
        .nav-2-content-1 ul li:nth-child(2) a {
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
                <div class="course">
                    <div class="box">

                        <?php

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
                                                            <p>'.$duration.'</p>
                                                            
                                                        </div>
                                                    ';

                                                                        } elseif ($i == 1) {
                                                                            echo '
                                                        <div class="course-card" onclick="window.location.href=\'course.php?course-id=' . $id . '\'">
                                                            <img src=' . $image . ' alt="">
                                                            <h3>' . $title . '</h3>
                                                            <p>'.$duration.'</p>
                                                            
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
                                                                    <p>'.$duration.'</p>
                                                                </div>
                                                        ';
                                                                                } elseif ($i == 3) {
                                                                                    echo '
                                                            <div class="course-card" onclick="window.location.href=\'course.php?course-id=' . $id . '\'">
                                                                <img src=' . $image . ' alt="">
                                                                <h3>' . $title . '</h3>
                                                                <p>'.$duration.'</p>
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


                        <!-- <div class="course-content">
                            <div class="course-contnet-1">
                                <div class="course-card">
                                    <img src="images/product-1.jpg" alt="">
                                    <h3>Webflow 101 crash course</h3>
                                    <p>Duration: 3m</p>
                                </div>
                                <div class="course-card">
                                    <img src="images/product-1.jpg" alt="">
                                    <h3>Webflow 101 crash course</h3>
                                    <p>Duration: 3m</p>
                                </div>
                            </div>
                            <div class="course-contnet-2">
                                <div class="course-card">
                                    <img src="images/product-1.jpg" alt="">
                                    <h3>Webflow 101 crash course</h3>
                                    <p>Duration: 3m</p>
                                </div>
                                <div class="course-card">
                                    <img src="images/product-1.jpg" alt="">
                                    <h3>Webflow 101 crash course</h3>
                                    <p>Duration: 3m</p>
                                </div>
                            </div>
                        </div>
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