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

function LoginUser($username, $password)
{
    $con = dbConnection();
    $query = "SELECT * from users where username='$username' and password='$password'";
}
