<?php
/*
require_once '../koneksi/fungsi.php';

$session = ceksession();

if (!$session) {
    header('location:login-admin.php');
}
*/
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
                    <a href="#">Hai <?php //echo $_SESSION['username']; ?></a>
                </div>
            </div>
        </div>

        <div class="section">
            <div class="menu"><a href="#">Profil</a></div>
            <div class="menu"><a href="#">User</a></div>
            <div class="menu"><a href="#">Perusahaan</a></div>
            <div class="menu"><a href="#">Gudang</a></div>
            <div class="menu"><a href="produk.php">Produk</a></div>
            <div class="menu"><a href="#">Penjualan</a></div>
            <div class="menu"><a href="#">Pembelian</a></div>
            <div class="menu"><a href="supplier.php">Supplier</a></div>
            <div class="menu"><a href="#">Manufaktur</a></div>
            <div class="menu"><a href="#">Laporan</a></div>
        </div>
