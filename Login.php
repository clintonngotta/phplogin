<?php
require('functions.php');
$con = dbConnection();

$username = isset($_POST['username']) ? $_POST['username'] : "";
$password = isset($_POST['password']) ? $_POST['password'] : "";
if (!empty($username) && !empty($password)) {
    $check =  LoginUser($username, $password);
    if (!empty($check)) {
        $response = array(
            "status" => 0,
            "mesage" => "logged in successfully!"
        );
        echo json_encode($response);
    } else {
        $response = array(
            "status" => 1,
            "mesage" => "wrong username or password"
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
