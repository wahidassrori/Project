<?php

require "../koneksi/fungsi.php";

//----------------------------- TAMBAH PRODUK --------------------------
if (isset($_POST['tampildata'])) {
	$result = mysqli_query($mysqli, "SELECT * FROM kategori");
	$no = 0;
	while ($rows = mysqli_fetch_assoc($result)) {
		$no++;
		echo "<tr>";
		echo '<td>'.$no.'</td>';
		echo '<td>'.$rows['kodekategori'].'</td>';
		echo '<td>'.$rows['kategori'].'</td>';
		echo '<td>'.$rows['tanggal'].'</td>';
		echo '<td>'.$rows['statuskategori'].'</td>';
		echo '<td>update/delete</td>';
		echo '</tr>';
	}
	
}

if (isset($_POST['aksi']) && $_POST['aksi'] == 'tambahproduk') {
	
	$result = mysqli_query($mysqli, "SELECT * FROM kategori");
	while ($rows = mysqli_fetch_assoc($result)) {
		$arrayData[] = $rows;
	}
	var_dump($arrayData);
	//echo json_encode($arrayData);

	/*
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
		$pesan = ['sukses' => 'Data berhasil ditambahkan'];
	} else {
		$error = mysqli_error($mysqli);
		$pesan = ['error' => $error];
	}

	echo json_encode($pesan);
	*/
}

//----------------------------- TAMBAH KATEGORI --------------------------

if (isset($_POST['aksi']) && $_POST['aksi'] == 'tambahkategori') {
	
	$kodekategori = input($_POST['kodekategori']);
	$kategori = input($_POST['kategori']);
	
	$result = mysqli_query($mysqli, "INSERT INTO kategori VALUES ('$kodekategori', '$kategori', NOW(), 'Active')");

	if ($result) {
		$arrayPesan = ['sukses' => 'Data berhasil ditambahkan'];
	} else {
		$error = mysqli_error($mysqli);
		$arrayPesan = ['error' => $error];
	}

	echo json_encode($arrayPesan);

	//var_dump($_POST);
}



?>