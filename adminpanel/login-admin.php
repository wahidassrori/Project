<?php

require_once '../koneksi/fungsi.php';
/*
$session = ceksession();

if ($session) {
    header('location:index.php');
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

    <script>
           
            let tombol = document.querySelector('#form-login');
            let result = document.querySelector('#result');

            tombol.addEventListener('submit', function(event) {
                
                event.preventDefault();

                let xhr = new XMLHttpRequest();

                xhr.onreadystatechange = function() {
                    if (xhr.readyState == 4 && xhr.status == 200) {
                        if (xhr.responseText == 'sukses') {
                            window.location.href = 'index.php';
                        }
                        else {
                            document.querySelector('#result').innerHTML = xhr.responseText;
                        }
                    }
                }
                
                let username = document.querySelector('#username').value;
                let password = document.querySelector('#password').value;
            
                xhr.open('POST', 'loginadmin.php', true);
                xhr.setRequestHeader('Content-Type', "application/x-www-form-urlencoded");
                xhr.send('username='+username+'&password='+password);

            });

            

    </script>

</body>
</html>