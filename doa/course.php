<?php

include "database.php";
session_start();

$courseId = "";

if (isset($_GET['course-id'])) {

    $courseId = $_GET['course-id'];

    $courseSql = mysqli_query($conn, "SELECT * FROM `courses` WHERE course_id = '$courseId'");
    $courseRow = mysqli_fetch_array($courseSql);
    if (is_array($courseRow)) {

        $courseUserId = $courseRow['user_id'];

    } else {
        header("location:coursers.php");
    }

} else {

    header("location:coursers.php");
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
    <link rel="stylesheet" href="style/course.css">
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
                <div class="course-header">
                    <img src="<?php
                    if (is_array($courseRow)) {
                        echo $courseRow['image'];
                    }
                    ?>" alt="">
                    <div class="course-header-content">
                        <div class="box">
                            <div class="course-header-content-details">
                                <h3>
                                    <?php
                                    if (is_array($courseRow)) {
                                        echo $courseRow['title'];
                                    }
                                    ?>
                                </h3>
                                <?php
                                echo '
                                    <button onclick="window.location.href=\'apply-course.php?course-id=' . $courseId . '\'">Apply Now</button>
                                ';
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="box">
                    <div class="course-content">
                        <div class="course-content-1">
                            <div class="course-content-detials">
                                <div>
                                    <div class="course-details">
                                        <div class="course-content-1-icon">
                                            <i class="ri-time-line"></i>
                                        </div>
                                        <div class="course-content-1-details">
                                            <div>
                                                <p>Duration</p>
                                                <h3>
                                                    <?php
                                                    if (is_array($courseRow)) {
                                                        echo $courseRow['duration'];
                                                    }
                                                    ?> Month
                                                </h3>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="course-details">
                                        <div class="course-content-1-icon">
                                            <i class="ri-money-dollar-circle-line"></i>
                                        </div>
                                        <div class="course-content-1-details">
                                            <div>
                                                <p>Annual tuition fee</p>
                                                <h3>LKR.
                                                    <?php
                                                    if (is_array($courseRow)) {
                                                        echo $courseRow['price'];
                                                    }
                                                    ?>/=
                                                </h3>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="course-details">
                                        <div class="course-content-1-icon">
                                            <i class="ri-calendar-2-line"></i>
                                        </div>
                                        <div class="course-content-1-details">
                                            <div>
                                                <p>Start Date</p>
                                                <h3>
                                                    <?php
                                                    if (is_array($courseRow)) {
                                                        echo $courseRow['date'];
                                                    }
                                                    ?>
                                                </h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="course-content-2">
                            <div class="section-header-content">
                                <div class="top-to-bottom-line"></div>
                                <h1>About this course</h1>
                            </div>
                            <p>
                                <?php
                                if (is_array($courseRow)) {
                                    echo $courseRow['description'];
                                }
                                ?>
                            </p>
                        </div>

                    </div>
                    <div class="course-conten-3">
                        <?php
                        echo '
                                    <button onclick="window.location.href=\'apply-course.php?course-id=' . $courseId . '\'">Apply Now</button>
                                ';

                        if (isset($_SESSION["user_type"])) {
                            if ($_SESSION["user_type"] == "admin") {
                                echo '<button class="delete" onclick="window.location.href=\'delete-course.php?course-id=' . $courseId . '\'">Delete</button>';
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