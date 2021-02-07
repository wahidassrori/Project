<?php

session_start();

require "../koneksi/fungsi.php";

$username = input($_POST["username"]);
$password = input($_POST["password"]);

$result = mysqli_query($mysqli, "SELECT username, password, usergrup FROM login WHERE username='$username' AND password='$password'");

if (mysqli_num_rows($result) > 0) {
	
	$usergrup = mysqli_fetch_assoc($result);
    $_SESSION['username'] = $username;
    $_SESSION['usergrup'] = $usergrup['usergrup'];

	echo "sukses";

}
else {
    echo "Username atau password salah!";
}

?>