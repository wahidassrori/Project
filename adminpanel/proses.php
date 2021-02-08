<?php
require "../koneksi/fungsi.php";

if (isset($_POST['proses']) && $_POST['proses'] == 'login')
{
	$username = inputValidation($_POST["username"]);
	$password = inputValidation($_POST["password"]);

	$query = mysqli_query($mysqli, "SELECT user.username, user.password, usergrup.usergrup FROM login INNER JOIN usergrup ON user.idusergrup=usergrup.idusergrup WHERE username='$username' AND password='$password'");
	echo mysqli_num_rows($query);
	/*
	if (mysqli_num_rows($query) > 0)
	{
		$rows = mysqli_fetch_assoc($query);
		$_SESSION['username'] = $username;
		$_SESSION['usergrup'] = $rows['usergrup'];
		echo $rows['usergrup'];
	}
	else
	{
		echo "Username atau password salah!";
	}
	*/
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