<?php

function koneksi()
{
    $mysqli = mysqli_connect("localhost", "root", "", "rental");

    if (!$mysqli) {
        echo "Failed to connect to MySql : (" .mysqli_connect_errno(). ") - ".mysqli_connect_error();
        die();
    }

    return $mysqli;

}

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
        return $_SESSION['username'];
        header('location:index.php');
    }
    else {
        $pesan = ['error' => 'Username or password wrong!'];
        return $pesan;
        header('location:login-admin.php');
    }
}

function login($username, $password)
{

    $mysqli = koneksi();

    $username = input($username);
    $password = input($password);

    $result = mysqli_query($mysqli, "SELECT username, password FROM login_admin WHERE username='$username' && password='$password'");

    if (mysqli_num_rows($result) > 0) {
        $_SESSION['username'] = $username;
        header('location:index.php');
    }

}

?>