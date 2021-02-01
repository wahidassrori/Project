
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
    <title>Document</title>
</head>
<body>

<div class="dashboard">

        <h2>Dashboard</h2>

        <form action="" method="POST">
            <label for="username">Username</label>
            <input type="text" name="username" placeholder="username">
            <label for="password">Password</label>
            <input type="password" name="password" placeholder="password">
            <input type="checkbox" name="remember" value="remember">
            <label for="remember">Remember me</label><br>

            <?php

            if (isset($_POST['login']) && isset($pesan['error'])) {
                echo $pesan['error'];
            }
            ?>

            <input type="submit" value="Login" name="login">
        </form>
    </div>
<!--
<div class="container">

    <header>

    </header>

    <section>
        <h2></h2>
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
        -->
</body>
</html>