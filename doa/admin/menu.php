<?php

include "database.php";
session_start();

$userId = "";

if (!isset($_SESSION["user_id"])) {
    header("location:../login.php");
} else {
    $userId = $_SESSION["user_id"];
}

$sql = mysqli_query($conn, "SELECT * FROM `gallery` WHERE 1");
$row = mysqli_fetch_array($sql);

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

    <img src="<?php echo (is_array($row) && $row['gallery'] !== "null") ? $row['gallery'] : 'images/gallery.png'; ?>"
        alt="">

</body>

</html>