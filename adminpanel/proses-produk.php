<?php

require "../koneksi/fungsi.php";

$kodeproduk = strtoupper(input($_POST['kodeproduk']));
$produk     = ucfirst(input($_POST['produk']));
$kategori   = input($_POST['kategori']);
$satuan     = input($_POST['satuan']);
$berat      = input($_POST['berat']);
$harga      = input($_POST['harga']);
$supplier   = input($_POST['supplier']);
$qty        = input($_POST['qty']);
$gudang     = input($_POST['gudang']);

$result = mysqli_query($mysqli, "INSERT INTO produk (kodeproduk, produk, kodekategori, kodesatuan, berat, harga, kodesupplier, qty, kodegudang) VALUES ('$kodeproduk', '$produk', '$kategori', '$satuan', '$berat', '$harga', '$supplier', '$qty', '$gudang')");

if ($result) {
	echo 'sukses';
} else {
	echo mysqli_error($mysqli);
}



?>