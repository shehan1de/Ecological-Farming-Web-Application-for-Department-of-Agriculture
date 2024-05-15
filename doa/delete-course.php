<?php

include "database.php";
session_start();

if (!isset($_SESSION["user_id"])) {

    header("location:login.php");

} else {

    if ($_SESSION['user_type'] == "admin") {

        if (isset($_GET['course-id'])) {

            $deleteId = $_GET['course-id'];

            $sql = "DELETE FROM courses WHERE course_id  = '$deleteId'";

            if (mysqli_query($conn, $sql)) {
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