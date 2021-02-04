<?php

session_start();

require "../koneksi/fungsi.php";

$username = input($_POST["username"]);
$password = input($_POST["password"]);

$result = mysqli_query($mysqli, "SELECT * FROM login WHERE username='$username' AND password='$password'");

if (mysqli_num_rows($result) > 0) {

    $_SESSION['username'] = $username;
    $_SESSION['password'] = $password;

    echo "sukses";

}
else {
    echo "Username atau password salah!";
}

?>