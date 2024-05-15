<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $firstName = $_POST["first_name"];
    $lastName = $_POST["last_name"];
    $email = $_POST["email"];
    $phoneNumber = $_POST["phone_number"];
    $nicNumber = $_POST["nic_number"];
    $address = $_POST["address"];
    $password = $_POST["password"];
    $confirmPassword = $_POST["confirm_password"];

    echo $firstName;

    header("../index.php");

    // $response = [
    //     "status" => "success",
    //     "message" => "Data received successfully!"
    // ];
    // header("Content-Type: application/json");
    // echo json_encode($response);

    

}

?>