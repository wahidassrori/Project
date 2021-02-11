<?php require_once '../koneksi/fungsi.php'; ?>
<!DOCTYPE html>
<html>

<head>
	<title>TEST</title>
</head>

<body>
	<button id="button" value="2020">Klik</button>
	<?php
	$query = mysqli_query($mysqli, "SELECT user.idusergrup, user.username, user.password, usergrup.usergrup FROM user INNER JOIN usergrup ON user.idusergrup=usergrup.idusergrup order by iduser DESC");
	$count  = mysqli_num_rows($query);
	while ($rows = mysqli_fetch_assoc($query)) {
		var_dump($rows);
		echo "<br>";
	}
	//echo json_encode($data);
	//$rows = mysqli_fetch_assoc($query);
	//var_dump($rows['username']);
	?>
</body>

</html>