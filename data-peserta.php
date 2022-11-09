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

    .btm:hover {
        background-color: rgb(255, 140, 8);
    }

    .text-left {
        margin-left: 10% !important;
        padding-top: 110px;
        font-family: "Quicksand", sans-serif;
        font-weight: bold;
    }

    .padding {
        padding-top: 30px;
    }

    h2 {
        font-size: 25px;
        font-weight: bold;
    }

    .content {
        padding-top: 30px;
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
        <h2>Data Peserta</h2>
        <div class="box">
            <a href="cetak-peserta.php" class="btn-cetak">Print</a>
            <table class="table table-bordered table-striped text-center">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>ID Pendaftaran</th>
                        <th>Nama</th>
                        <th>Jenis Kelamin</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    $list_peserta = mysqli_query($conn, "SELECT * FROM  tb_pendaftaran");

                    while ($row = mysqli_fetch_array($list_peserta)) {

                    ?>
                        <tr>
                            <td><?php echo $no++ ?></td>
                            <td><?php echo $row['id_pendaftaran'] ?></td>
                            <td><?php echo $row['nm_peserta'] ?></td>
                            <td><?php echo $row['jk'] ?></td>
                            <td>
                                <a href="detail-peserta.php?id=<?php echo $row['id_pendaftaran'] ?>" class="btn btn-warning">Detail</a>
                                <a href="hapus-peserta.php?id=<?php echo $row['id_pendaftaran'] ?>" onclick="return confirm('Yakin Hapus?')" class="btn btn-danger">Hapus</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
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