<?php
session_start();
$mysqli = koneksi();

function koneksi()
{
    $mysqli = mysqli_connect("localhost", "root", "", "project");
    if (!$mysqli) {
        echo "Failed to connect to MySql : (" .mysqli_connect_errno(). ") - ".mysqli_connect_error();
        die();
    }
    return $mysqli;
}

function inputValidation($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

function loginValidation()
{

    if (isset($_SESSION['username']) && isset($_SESSION['usergrup']) && !empty($_SESSION['username']) && !empty($_SESSION['usergrup'])) {
        $usergrup = $_SESSION['usergrup'];
        return true;      
    }
    else {
        return false;
    }

}

function userValidation() {

    if (isset($_SESSION['username']) && isset($_SESSION['usergrup']) && !empty($_SESSION['username']) && !empty($_SESSION['usergrup']))
    {

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
    else{
        header("location:login-admin.php");
        exit();
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