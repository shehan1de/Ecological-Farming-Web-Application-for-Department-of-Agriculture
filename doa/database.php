<?php
$dbServer = "localhost";
$dbUser = "root";
$dbPass = "YES";
$database = "doa";

$conn = mysqli_connect($dbServer, $dbUser, $dbPass, $database);

if ($conn) {
    // echo "Success!";
}
?>