<!DOCTYPE html>
<html>
<head>
	<title>TEST</title>
</head>
<body>
	<button id="button" value="2020">Klik</button>
	<?php

	$x = 0;
	$y = 0;
	while ($x < 10) {
		$x = $x+1;
		while ($y < $x) {
			$y++;
			echo $y;
			echo $x;
		}
	}

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