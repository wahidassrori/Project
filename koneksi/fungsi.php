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

    if (isset($_SESSION['username']) && isset($_SESSION['usergrup']) && !empty($_SESSION['username']) && !empty($_SESSION['usergrup'])) {
        $usergrup = $_SESSION['usergrup'];
        //$query = mysqli_query("SELECT akses FROM usergrup WHERE usergrup='$usergrup'");
        //$pecah = explode('-', $)
        return true;
        
    }
    else {
        return false;
    }

}

function cekusergrup() {

    $mysqli = koneksi();

    $usergrup = $_SESSION['usergrup'];
    $query = mysqli_query($mysqli, "SELECT akses FROM usergrup WHERE usergrup='$usergrup'");
    $rows = mysqli_fetch_assoc($query);

    $akses = explode('-', $rows['akses']);
    array_push($akses, 'index');

    $count = count($akses);

    $arrayurl = explode('/',$_SERVER["REQUEST_URI"]);
    $url = end($arrayurl);

    foreach ($akses as $value) {
        $array[] = $value.'.php';
    }

    if (in_array($url, $array)) {
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

if (isset($_SESSION)) {
    # code...
}

?>