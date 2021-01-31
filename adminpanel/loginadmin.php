<?php

session_start();

require "../koneksi/koneksi.php";
require "../koneksi/fungsi.php";

$username = input($_POST["username"]);
$password = input($_POST["password"]);

$query = $mysqli->query("SELECT * FROM login_admin WHERE username='$username' AND password='$password'");

if ($query->num_rows > 0) {

    $_SESSION['username'] = $username;
    $_SESSION['password'] = $password;

    header("location:dashboard-admin.php");
    die();
}
else {
    $pesan = array('Username atau password salah!');
    //mengubah array menjadi json
    $jsonfile = json_encode($pesan);
    //membuat dan menyimpan file json
    file_put_contents('pesan.json', $jsonfile);
    header("location:login-admin.php");
    die();
}

?>