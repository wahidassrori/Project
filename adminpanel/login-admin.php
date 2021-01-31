<?php

require_once '../koneksi/fungsi.php';

//$pesan = ceksession();

//if (isset($_POST['login'])) {
//    login($_POST['username'], $_POST['password']);
//}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/full-custom.css">
    <link rel="stylesheet" href="../style/admin.css">
    <title>ADMIN</title>
</head>
<body>
    <div class="container-login">
    <div class="login-admin">

        <h2>Login Admin</h2>

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
    </div>
</body>
</html>