<?php
require "../koneksi/fungsi.php";

if (isset($_POST['proses']) && $_POST['proses'] == 'login') {
	$username = inputValidation($_POST["username"]);
	$password = inputValidation($_POST["password"]);


	$querylogin = mysqli_query($mysqli, "SELECT username, password, idusergrup FROM user WHERE username='$username' AND password='$password'");

	if (mysqli_num_rows($querylogin) > 0) {
		$loginrows = mysqli_fetch_assoc($querylogin);
		$query = mysqli_query($mysqli, "SELECT usergrup FROM usergrup WHERE idusergrup='{$loginrows['idusergrup']}'");
		$rows = mysqli_fetch_assoc($query);
		$_SESSION['username'] = $username;
		$_SESSION['usergrup'] = $rows['usergrup'];
		echo "sukses";
	} else {
		echo "Username atau password salah!";
	}
}

if (isset($_POST['proses']) && $_POST['proses'] == 'tambahuser') {
	$username = inputValidation($_POST["username"]);
	$password = password_hash(inputValidation($_POST["password"]), PASSWORD_DEFAULT);
	$idusergrup = inputValidation($_POST["idusergrup"]);


	$query = mysqli_query($mysqli, "INSERT INTO user (username, password, idusergrup) VALUES ('$username', '$password', $idusergrup)");

	if ($query) {
		echo "sukses";
	} else {
		echo mysqli_error($mysqli);
	}
}

if (isset($_POST['proses']) && $_POST['proses'] == 'dataedituser') {
	$iduser = $_POST['id'];
	$query = mysqli_query($mysqli, "SELECT username, password, idusergrup FROM user WHERE idusergrup=$iduser");
	if (mysqli_num_rows($query) > 0) {
		while ($rows = mysqli_fetch_assoc($query)) {
			$username[] = $rows['username'];
			$password[] = $rows['password'];
			$idusergrup[] = $rows['idusergrup'];
		}
		echo json_encode($username);
	} else {
		echo mysqli_error($mysqli);
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

if (isset($_POST['proses']) && $_POST['proses'] == 'datauser') {

	$query = mysqli_query($mysqli, "SELECT user.idusergrup, user.username, user.password, usergrup.usergrup FROM user INNER JOIN usergrup ON user.idusergrup=usergrup.idusergrup order by iduser DESC");
	$count  = mysqli_num_rows($query);
	while ($rows = mysqli_fetch_assoc($query)) {
		$data[] = $rows;
	}

	echo json_encode($data);

	/*
	$nomor = $count + 1;
	while ($rows = mysqli_fetch_assoc($query)) {
		$nomor--;
		echo "<tr>";
		echo '<td>' . $nomor . '</td>';
		echo '<td>' . $rows['username'] . '</td>';
		echo '<td>' . $rows['password'] . '</td>';
		echo '<td><select name="usergrup">';
		$queryusergrup = mysqli_query($mysqli, "SELECT idusergrup, usergrup FROM usergrup");
		while ($kolom = mysqli_fetch_assoc($queryusergrup)) {
			if ($rows['idusergrup'] == $kolom['idusergrup']) {
				$option = "selected";
			} else {
				$option = "";
			}
			echo '<option value="' . $kolom['idusergrup'] . '" ' . $option . '>' . $kolom['usergrup'] . '</option>';
		}
		echo "</select></td>";
		echo '<td><button class="user-edit" value="' . $rows['idusergrup'] . '">Edit</button> - <button class="user-delete" value="' . $rows['idusergrup'] . '">delete</button></td>';
		echo '</tr>';
	}
	*/
}
