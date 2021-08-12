<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Content-Type");
require('functions.php');
$con = dbConnection();

$username = isset($_POST['username']) ? mysqli_real_escape_string($con, $_POST['username']) : "";
$password = isset($_POST['password']) ? mysqli_real_escape_string($con, $_POST['password']) : "";
if (!empty($username) && !empty($password)) {
    $signup = SignUpUser($username, $password);
    if (!empty($signup)) {
        $response = array(
            "status" => 0,
            "mesage" => "user created successfully!"
        );
        echo json_encode($response);
    } else {
        $response = array(
            "status" => 1,
            "mesage" => "Error Occured, try again!"
        );
        echo json_encode($response);
    }
} else {
    $response = array(
        "status" => 1,
        "mesage" => "Empty username or password"
    );
    echo json_encode($response);
}
