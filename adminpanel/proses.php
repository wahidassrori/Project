<?php
require "../koneksi/fungsi.php";

if (isset($_POST['proses']) && $_POST['proses'] == 'login')
{
	$username = inputValidation($_POST["username"]);
	$password = inputValidation($_POST["password"]);


	$querylogin = mysqli_query($mysqli, "SELECT username, password, idusergrup FROM user WHERE username='$username' AND password='$password'");

	if (mysqli_num_rows($querylogin) > 0)
	{	
		$loginrows = mysqli_fetch_assoc($querylogin);
		$query = mysqli_query($mysqli, "SELECT usergrup FROM usergrup WHERE idusergrup='{$loginrows['idusergrup']}'");
		$rows = mysqli_fetch_assoc($query);
		$_SESSION['username'] = $username;
		$_SESSION['usergrup'] = $rows['usergrup'];
		echo "sukses";
	}
	else
	{
		echo "Username atau password salah!";
	}
}

/*
if () {
	$usergrup = $_SESSION['usergrup'];
	$query = mysqli_query($mysqli, "SELECT akses FROM usergrup WHERE usergrup='$usergrup'");
	$rows = mysqli_fetch_assoc($query);

	$akses = explode('-', $rows['akses']);

	echo json_encode($akses);
}
*/

if (isset($_POST['tampildatauser'])) {
	$query = mysqli_query($mysqli, "SELECT * FROM login order by idlogin DESC");
	$count  = mysqli_num_rows($query);
	$nomor = $count + 1;
	while ($rows = mysqli_fetch_assoc($query)) {
		$nomor--;
		echo "<tr>";
		echo '<td>'.$nomor.'</td>';
		echo '<td>'.$rows['username'].'</td>';
		echo '<td>'.$rows['password'].'</td>';
		echo '<td><select name="usergrup">';
		echo '<option value="'.$rows['usergrup'].'">'.$rows['usergrup'].'</option>';
		echo "</select></td>";
		echo '<td>update/delete</td>';
		echo '</tr>';
	}
}

?>