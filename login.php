<?php
session_start();
include 'koneksi.php';

if (isset($_POST['login'])) {

    //cek akun ada apa tidak
    $cek = mysqli_query($conn, "SELECT * FROM tb_admin
       WHERE username = '" . htmlspecialchars($_POST['user'])  . "' AND password ='" . (htmlspecialchars($_POST['pass']) . "'"));

    if (mysqli_num_rows($cek) > 0) {
        $a = mysqli_fetch_object($cek);

        $_SESSION['start_login'] = true;
        $_SESSION['id_admin'] = $a->id_admin;
        $_SESSION['nama'] = $a->nm_admin;
        echo '<script>window.location="beranda.php"</script>';
    } else {
        echo '<script>alert("Gagal, username atau password salah")</script>';
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Login</title>
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
</head>

<body>
    <!---Page Login --->
    <div class="page-login">

        <!---Box-->
        <div class="box box-login">
            <!--box header--->
            <div class="box-header text-center">
                L O G I N
            </div>
            <!---Box body--->
            <div class="box-body">
                <!---form login-->
                <form action="" method="POST">
                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" name="user" placeholder="Username" class="input-kontrol">
                    </div>

                    <div class="form-group">
                        <label>Password</label>
                        <input type="Password" name="pass" placeholder="Password" class="input-kontrol">
                    </div>

                    <input type="submit" name="login" value="Login" class="btn">
                </form>



            </div>
            <!----box footer--->
            <div class="box-footer text-center">
                <a href="index.php">halaman utama</a>
            </div>
        </div>
    </div>
</body>

</html>