<!DOCTYPE html>
<html>

<head>
	<title>TEST</title>
</head>

<body>
	<button id="button" value="2020">Klik</button>
	<?php
	$array = ['satu' => 'satu', 'dua' => 'dua', 'tiga' => 'tiga'];
	$array2 = []
	var_dump($array);
	echo "<br>";
	var_dump($array2);
	?>
	<script type="text/javascript">
		const button = document.querySelector('#button');
		button.addEventListener('click', function() {
			const button = document.querySelector('#button').value;
			//const nilai = button.getAttribute('value');
			console.log(button);
		})
	</script>
</body>

</html>