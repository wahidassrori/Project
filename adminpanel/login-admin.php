<?php
require '../koneksi/fungsi.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="full-custom.css">
    <link rel="stylesheet" href="admin.css">
    <title>ADMIN</title>
</head>

<body>
    <div class="container-login">
        <div class="login-admin">

            <h2>Login Admin</h2>

            <form id="form-login">
                <label for="username">Username</label>
                <input type="text" name="username" id="username" placeholder="username">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" placeholder="password" autocomplete="off">
                <input type="checkbox" name="remember" value="remember">
                <label for="remember">Remember me</label><br>
                <p id="result"></p>
                <input type="submit" value="Login">
            </form>
        </div>
    </div>
    <script src="script.js"></script>
</body>

</html>