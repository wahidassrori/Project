<?php

require_once '../koneksi/fungsi.php';

if (!userValidation()) {
    exit('akses ditolak!!');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="full-custom.css">
    <link rel="stylesheet" href="admin.css">
    <title>Document</title>
</head>

<body>
    <div class="container-index">

        <div class="header">
            <div class="header-left">
                <h2>Dashboard</h2>
            </div>
            <div class="header-right">
                <div class="left">
                    <img src="img/profil.png" alt="image-profile">
                </div>
                <div class="right">
                    <a href="#">Hai <?php echo $_SESSION['username']; ?></a>
                </div>
            </div>
        </div>

        <div class="section">
            <div id="menu-profil" class="menu"><a href="profil.php">Profil</a></div>
            <div id="menu-user" class="menu"><a href="user.php">User</a></div>
            <div id="menu-perusahaan" class="menu"><a href="perusahaan.php">Perusahaan</a></div>
            <div id="menu-gudang" class="menu"><a href="gudang.php">Gudang</a></div>
            <div id="menu-produk" class="menu"><a href="produk.php">Produk</a></div>
            <div id="menu-penjualan" class="menu"><a href="penjualan.php">Penjualan</a></div>
            <div id="menu-pembelian" class="menu"><a href="pembelian.php">Pembelian</a></div>
            <div id="menu-supplier" class="menu"><a href="supplier.php">Supplier</a></div>
            <div id="menu-manufaktur" class="menu"><a href="manufaktur.php">Manufaktur</a></div>
            <div id="menu-laporan" class="menu"><a href="laporan.php">Laporan</a></div>
        </div>