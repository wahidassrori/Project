<?php

function koneksi()
{
    $mysqli = mysqli_connect("localhost", "root", "", "project");

    if (!$mysqli) {
        echo "Failed to connect to MySql : (" .mysqli_connect_errno(). ") - ".mysqli_connect_error();
        die();
    }

    return $mysqli;

}

$mysqli = koneksi();

function input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

function ceksession()
{
    
    session_start();

    if (isset($_SESSION['username']) && !empty($_SESSION['username'])) {
        return true;
    }
    else {
        return false;
    }

}

function login($username, $password)
{

    $mysqli = koneksi();

    $username = input($username);
    $password = input($password);

    $result = mysqli_query($mysqli, "SELECT username, password FROM login WHERE username='$username' && password='$password'");

    if (mysqli_num_rows($result) > 0) {
        $_SESSION['username'] = $username;
        header('location:index.php');
    }

}

?>