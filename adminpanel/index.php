
<?php

require_once '../koneksi/fungsi.php';

$session = ceksession();

if (!$session) {
    header('location:login-admin.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/full-custom.css">
    <link rel="stylesheet" href="../style/admin.css">
    <title>Document</title>
</head>
<body>

</body>
</html>