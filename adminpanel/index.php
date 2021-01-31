
<?php

require_once '../koneksi/fungsi.php';

$session = ceksession();

if (isset($_POST['login'])) {
    login($_POST['username'], $_POST['password']);
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

<div class="container">

    <header>

    </header>

    <section>
        <h2><?php echo "Halo ".$session." :)"; ?></h2>
        <br>
        <ul>
            <li><a href="produk.php">Produk</a></li>
            <li><a href="penjualan.php">Penjualan</a></li>
            <li><a href="pembelian.php">Pembelian</a></li>
            <li><a href="laporan.php">Laporan</a></li>
        </ul>
    </section>

    <article>
        
    </article>

    <footer>
    
    </footer>

</div>

</body>
</html>