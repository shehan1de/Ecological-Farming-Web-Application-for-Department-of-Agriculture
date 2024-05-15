<?php

include "database.php";
session_start();

$userId = '';

if (!isset($_SESSION["user_id"])) {
    header("location:login.php");
} else {

    if ($_SESSION['user_type'] == "field_officer") {
        $userId = $_SESSION["user_id"];
    } else {
        header("location:index.php");
    }

}

$sql = mysqli_query($conn, "SELECT * FROM `user` WHERE user_id = '$userId'");
$row = mysqli_fetch_array($sql);


$messageSql = mysqli_query($conn, "SELECT * FROM `message` WHERE 1 ORDER BY message_id DESC");


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
    <link rel="stylesheet" href="style/view-message.css">
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
                                <th>Name</th>
                                <th>Email</th>
                                <th>Subject</th>
                                <th>Message</th>
                                <th>Date</th>
                            </tr>
                            <?php
                            if ($messageSql) {
                                if (mysqli_num_rows($messageSql) > 0) {
                                    while ($messageRow = mysqli_fetch_array($messageSql)) {

                                        $sendUserId = $messageRow['user_id'];
                                        $first_name = $messageRow['first_name'];
                                        $last_name = $messageRow['last_name'];
                                        $subject = $messageRow['subject'];
                                        $message = $messageRow["message"];
                                        $data = $messageRow["data"];
                                        $email = "";

                                        $sql = mysqli_query($conn, "SELECT * FROM `user` WHERE user_id = '$sendUserId'");
                                        $row = mysqli_fetch_array($sql);
                                        if (is_array($row)) {
                                            $email = $row['email'];
                                        }

                                        echo "
                                        <tr>
                                            <td>$first_name $last_name</td>
                                            <td>$email</td>
                                            <td>$subject</td>
                                            <td>$message</td>
                                            <td>$data</td>
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