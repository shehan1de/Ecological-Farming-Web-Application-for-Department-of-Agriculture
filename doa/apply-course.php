<?php

include "database.php";
session_start();

if (!isset($_SESSION["user_id"])) {

    header("location:login.php");

} else {

    if ($_SESSION['user_type'] == "farmer") {

        $userId = $_SESSION["user_id"];

        if (isset($_GET['course-id'])) {

            $courseId = $_GET['course-id'];
            $date = date("F j, Y");

            $courseSql = mysqli_query($conn, "SELECT * FROM `courses` WHERE course_id = '$courseId'");
            $courseRow = mysqli_fetch_array($courseSql);
            if (is_array($courseRow)) {

                $courseSql = mysqli_query($conn, "SELECT * FROM `apply_course` WHERE course_id = '$courseId' AND user_id = '$userId'");
                $courseRow = mysqli_fetch_array($courseSql);
                if (is_array($courseRow)) {
                    header("location:course.php?course-id=$courseId&successful=applied");
                } else {

                    // $courseUserId = $courseRow['user_id'];

                    $sql = "INSERT INTO `apply_course`(`user_id`, `course_id`, `date`) VALUES ('$userId','$courseId','$date')";

                    if (mysqli_query($conn, $sql)) {
                        header("location:course.php?course-id=$courseId&successful=applied");
                    }
                }

            } else {

                header("location:coursers.php");
            }

        } else {

            header("location:coursers.php");
        }

    } else {

        header("location:coursers.php");

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
</head>

<body>


</body>

</html>