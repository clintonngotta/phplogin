<?php
function dbConnection()
{
    $con = new mysqli("localhost", "YouTube", "Clikham", "LoginSystem");
    if (!$con) {
        die("connection failed: " . mysqli_connect_error());
    } else {
        return $con;
    }
}
function GenericFetchData($table, $orderBy, $orderCriteria)
{
    $con = dbConnection();
    $query = "SELECT * FROM $table ORDER BY $orderBy $orderCriteria";
    $results = mysqli_query($con, $query) or die(mysqli_error($con));
    if (mysqli_num_rows($results) > 0) {
        return $results->fetch_assoc();
    } else {
        return [];
    }
}

function GenericFetchDataById($table, $where, $id)
{
    $con = dbConnection();
    $query = "SELECT * FROM $table WHERE $where =$id";
    $results = mysqli_query($con, $query) or die(mysqli_error($con));
    if (mysqli_num_rows($results) > 0) {
        return $results->fetch_assoc();
    } else {
        return [];
    }
}

function LoginUser($username, $password)
{
    $con = dbConnection();
    $query = "SELECT * from users where username='$username' and password='$password'";
    $results = mysqli_query($con, $query) or die(mysqli_error($con));
    if (mysqli_num_rows($results) > 0) {
        return true;
    }
}

function SignUpUser($username, $password)
{
    $con = dbConnection();
    $query = "INSERT INTO users VALUES(null, '" . $username . "', '" . md5($password) . "', '')";
    $execution = mysqli_query($con, $query) or die(mysqli_error($con));
    if ($execution) {
        return true;
    }
}
