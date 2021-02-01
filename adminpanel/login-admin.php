<?php

//require_once '../koneksi/fungsi.php';

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

        <form method="POST">
            <label for="username">Username</label>
            <input type="text" name="username" id="username" placeholder="username">
            <label for="password">Password</label>
            <input type="password" name="text" id="password" placeholder="password" autocomplete="on">
            <input type="checkbox" name="remember" value="remember">
            <label for="remember">Remember me</label><br>
            <p class="hasil">Ubah saya...</p>

            <?php

            if (isset($_POST['login']) && isset($pesan['error'])) {
                echo $pesan['error'];
            }
            
            ?>

            <input type="submit" value="Login" name="login" id="login">
        </form>
        
    </div>
    </div>

    <script>
    
            //const username = document.querySelector('#username').value;
            //const password = document.querySelector('#password').value;
            //const hasil = document.querySelector('.hasil');
            
            let tombol = document.getElementById('form1');
            let hasil = document.querySelector('#result');

            tombol.addEventListener('submit', function(event) {

                event.preventDefault();

                let nama = document.querySelector('#nama').value;
                //let hasil = document.querySelector('#result');
                //let pesan = document.getElementById('p#result');
                console.log('hai '+nama);
                result.innerHTML='HAI '+nama;
            });

            

    </script>

</body>
</html>