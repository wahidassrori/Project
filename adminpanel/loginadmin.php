<?php

session_start();

require "../koneksi/fungsi.php";

$mysqli = koneksi();

$username = input($_POST["username"]);
$password = input($_POST["password"]);

$query = $mysqli->query("SELECT * FROM login_admin WHERE username='$username' AND password='$password'");

if ($query->num_rows > 0) {

    $_SESSION['username'] = $username;
    $_SESSION['password'] = $password;

    echo "sukses";

}
else {
    echo "Username atau password salah!";
}

?>