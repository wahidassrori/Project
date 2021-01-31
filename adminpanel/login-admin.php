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
    <div class="login-admin">

        <h2>Login Admin</h2>

        <form action="loginadmin.php" method="POST">
            <label for="username">Username</label>
            <input type="text" name="username" placeholder="username">
            <label for="password">Password</label>
            <input type="password" name="password" placeholder="password">
            <input type="checkbox" name="remember" value="remember">
            <label for="remember">Remember me</label><br>

            <?php

                
                if (file_exists('pesan.json')) {
                    $file = file_get_contents('pesan.json');
                    $pesan = json_decode($file);
                    if (isset($pesan) && $pesan != "") {
                        echo implode($pesan);
                        unlink('pesan.json');
                    }
                }
                
            ?>

            <input type="submit" value="Login">
        </form>
    </div>
</body>
</html>