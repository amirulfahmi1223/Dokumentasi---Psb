<?php
session_start();
include 'koneksi.php';
if ($_SESSION['start_login'] != true) {
    echo '<script>window.location="login.php"</script>';
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PPBD SMK | Administator</title>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand&family=Source+Code+Pro:ital,wght@1,500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style-psb.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css" />
</head>
<style>
    body {
        background-color: #f9f9f9;
    }

    .box {
        padding: 26px;
    }

    .text-left {
        margin-left: 10% !important;
        padding-top: 110px;
        font-family: "Quicksand", sans-serif;
        font-weight: bold;
    }

    .padding {
        padding-top: 50px;
    }

    h3 {
        font-weight: bold;
        font-size: 20px;
    }

    h2 {
        font-weight: bold;
        font-size: 26px;
    }

    .isi-footer {
        margin-left: 6%;
    }
</style>

<body>
    <!-- Bagian navbar-->
    <div class="padding">
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow fixed-top border-bottom border-dark">
            <div class="container px-5">
                <a class="navbar-brand fs-3 fw-200" href="form-pendaftaran.php">Admin PPDB</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item mx-3"><a class="nav-link active" aria-current="page" href="beranda.php">Beranda</a>
                        </li>
                        <li class="nav-item mx-2"><a class="nav-link" href="data-peserta.php">Data Peserta</a></li>
                        <li class="nav-item mx-2"><a class="nav-link" href="keluar.php">Keluar</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
    <!---Bagian Content--->
    <section class="content">
        <h2>Beranda</h2>
        <div class="box">
            <h3><?php echo $_SESSION['nama'] ?>, Selamat Datang di PPDB Online.</h3>
        </div>
    </section>
    <footer>
        <div class="isi-footer">
            <small>Copyright &copy; 2022 - FahmiCode.</small>
        </div>
    </footer>
    <!--Link bostrap Js-->
    <script src="bootstrap/js/bootstrap.min.js"></script>

</body>

</html>