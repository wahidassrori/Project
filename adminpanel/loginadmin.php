<?php

require "../koneksi/fungsi.php";

$username = inputValidation($_POST["username"]);
$password = inputValidation($_POST["password"]);

$query = mysqli_query($mysqli, "SELECT username, password, usergrup FROM login WHERE username='$username' AND password='$password'");

if (mysqli_num_rows($query) > 0)
{
	$usergrup = mysqli_fetch_assoc($query);
    $_SESSION['username'] = $username;
    $_SESSION['usergrup'] = $usergrup['usergrup'];
	echo "sukses";
}
else
{
    echo "Username atau password salah!";
}

?>