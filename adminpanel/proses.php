<?php
require "../koneksi/fungsi.php";

if (isset($_POST['proses']) && $_POST['proses'] === 'simpan_edit_user') {
	$iduser = inputValidation($_POST["iduser"]);
	$username = inputValidation($_POST["username"]);
	$password = inputValidation($_POST["password"]);
	$idusergrup = inputValidation($_POST["idusergrup"]);
	$query = mysqli_query($mysqli, "UPDATE user SET username='$username', password='$password', idusergrup='$idusergrup' WHERE iduser='$iduser'");
	if ($query) {
		echo "sukses";
	} else {
		echo mysqli_error($mysqli);
	}
	//var_dump($_POST);
}

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
	$password = inputValidation($_POST["password"]);
	$idusergrup = inputValidation($_POST["idusergrup"]);
	$query_data = mysqli_query($mysqli, "SELECT username, password FROM user WHERE username='$username' AND password='$password'");
	if (mysqli_num_rows($query_data) > 0) {
		echo "error";
	} else {
		$query = mysqli_query($mysqli, "INSERT INTO user (username, password, idusergrup) VALUES ('$username', '$password', $idusergrup)");
		if ($query) {
			echo "sukses";
		} else {
			echo mysqli_error($mysqli);
		}
	}
}

if (isset($_POST['proses']) && $_POST['proses'] == 'datauser') {
	$query = mysqli_query($mysqli, "SELECT user.iduser, user.idusergrup, user.username, user.password, usergrup.usergrup FROM user INNER JOIN usergrup ON user.idusergrup=usergrup.idusergrup order by iduser DESC");
	$count  = mysqli_num_rows($query);
	$nomor = $count + 1;
	while ($rows = mysqli_fetch_assoc($query)) {
		$nomor--;
		echo "<tr>";
		echo '<td>' . $nomor . '</td>';
		echo '<td>' . $rows['username'] . '</td>';
		echo '<td>' . $rows['password'] . '</td>';
		echo '<td><select name="usergrup" id="' . $rows['iduser'] . '">';
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
		echo '<td><button class="button-default user-edit" value="' . $rows['iduser'] . '">Edit</button> <button class="button-default user-delete" value="' . $rows['iduser'] . '">delete</button></td>';
		echo '</tr>';
	}
}

if (isset($_POST['proses']) && $_POST['proses'] == 'data_user') {
	$query = mysqli_query($mysqli, "SELECT user.iduser, user.username, user.password, usergrup.usergrup, user.idusergrup FROM user INNER JOIN usergrup ON user.idusergrup=usergrup.idusergrup order by iduser DESC");
	$count  = mysqli_num_rows($query);
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
			echo '<option value="' . $kolom['idusergrup'] . '"' . $option . '>' . $kolom['usergrup'] . '</option>';
		}
		echo "</select></td>";
		echo '<td><button class="button-default user-edit" value="' . $rows['iduser'] . '">Edit</button> <button class="button-default user-delete" value="' . $rows['iduser'] . '">delete</button></td>';
		echo '</tr>';
	}
}

if (isset($_POST['proses']) && $_POST['proses'] === 'edit_user') {
	$iduser = $_POST['iduser'];
	$query_data_user = mysqli_query($mysqli, "SELECT * FROM user WHERE iduser=$iduser");
	$rows = mysqli_fetch_assoc($query_data_user);
	$query_data_usergrup = mysqli_query($mysqli, "SELECT idusergrup, usergrup FROM usergrup");
	while ($kolom = mysqli_fetch_assoc($query_data_usergrup)) {
		$rows['usergrup'][] = $kolom;
	}
	//var_dump($rows);
	echo json_encode($rows);
}

if (isset($_POST['proses']) && $_POST['proses'] == 'delete_user') {
	$iduser = $_POST['id_user'];
	$query = mysqli_query($mysqli, "DELETE FROM user WHERE iduser=$iduser");
	if ($query) {
		echo 'sukses';
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
