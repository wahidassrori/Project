<?php

require_once '../koneksi/fungsi.php';

$usergrup = $_SESSION['usergrup'];
$query = mysqli_query($mysqli, "SELECT akses FROM usergrup WHERE usergrup='$usergrup'");
$rows = mysqli_fetch_assoc($query);

$akses = explode('-', $rows['akses']);

echo json_encode($akses);

?>