<?php

require_once '../koneksi/fungsi.php';

$session = ceksession();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/full-custom.css">
    <link rel="stylesheet" href="../style/admin.css">
    <title>Produk</title>
</head>
<body>
<div class="produk">

    <h2>Input Produk</h2>

    <form action="" method="POST">
        <label for="nama produk">Nama Produk
            <input type="text" name="namaproduk" placeholder="Nama Produk">
        </label>
        <label for="stok">Stok Produk
            <input type="number" name="stok" placeholder="Jumlah Produk">
        </label>
        <label for="harga">Harga
            <input type="number" name="harga" placeholder="Harga">
        </label>

        <?php

        if (isset($_POST['login']) && isset($pesan['error'])) {
            echo $pesan['error'];
        }
        ?>

        <input type="submit" value="Tambah Produk" name="tambah">
        <a href="data.php">Lihat Data</a>
    </form>
</div>
</body>
</html>