<?php require_once '../koneksi/fungsi.php'; ?>
<!DOCTYPE html>
<html>

<head>
	<title>TEST</title>
</head>

<body>
	<table>
		<tr>
			<th>No</th>
			<th>Username</th>
			<th>Password</th>
			<th>Usergrup</th>
			<th>Opsi</th>
		</tr>
		<tbody class="datauser">
		</tbody>
	</table>
	<script>
		function makeAJAXCall(methodType, url, callback) {
			let xhr = new XMLHttpRequest();
			xhr.onreadystatechange = function() {
				if (xhr.readyState == 4 && xhr.status == 200) {
					document.querySelector('.datauser').innerHTML = xhr.response;
					//console.log(xhr.response);
					callback();
				}
			}
			xhr.open(methodType, url);
			xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			const kirim = "proses=data_user";
			xhr.send(kirim);
			//console.log("request sent to the server");
		}

		var url = "proses.php";
		makeAJAXCall("POST", url, () => {
			let buttonEdit = document.querySelectorAll('.user-edit');
			console.log(buttonEdit.length);
		});
	</script>
</body>

</html>