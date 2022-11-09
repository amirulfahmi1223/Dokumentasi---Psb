<?php
include 'koneksi.php';
if (isset($_POST['submit'])) {

    //ambil Id terbesar di kolom id pendaftaran,lalu ambil 5 karakter aja dari sebelah kanan 
    $getMaxId = mysqli_query($conn, "SELECT MAX(RIGHT(id_pendaftaran, 5)) AS id FROM tb_pendaftaran");
    $d = mysqli_fetch_object($getMaxId);
    $generateId = 'P' . date('Y') . sprintf("%05s", $d->id + 1);
    echo $generateId;

    //Proses Insert
    $insert = mysqli_query($conn, "INSERT INTO tb_pendaftaran VALUES(
    '" . $generateId . "',
    '" . date('Y-m-d') . "',
    '" . $_POST['th_ajaran'] . "',
    '" . $_POST['jurusan'] . "',
    '" . $_POST['nm'] . "',
    '" . $_POST['tmp_lahir'] . "',
    '" . $_POST['tgl_lahir'] . "',
    '" . $_POST['jenis_kelamin'] . "',
    '" . $_POST['agama'] . "',
    '" . $_POST['alamat'] . "'
                    )");

    if ($insert) {
        echo '<script>window.location="berhasil.php?id=' . $generateId . '"</script>';
    } else {
        echo "gagal" . mysqli_error($conn);
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PPBD SMK Negeri 4 Bojonegoro</title>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand&family=Source+Code+Pro:ital,wght@1,500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css" />
</head>

<body>
    <!--- bagian box formulir-->
    <section class="box-formulir">
        <h2>Formulir PPDB SMK Negeri 4 Bojonegoro</h2>

        <!---Bagian Form--->
        <form action="" method="post">
            <div class="box">
                <table border="0" class="table-form">
                    <tr>
                        <td>Tahun Ajaran</td>
                        <td>:</td>
                        <td>
                            <input type="text" name="th_ajaran" class="input-control" value="2022/2023" readonly>
                        </td>
                    </tr>
                    <tr>
                        <td>Jurusan</td>
                        <td>:</td>
                        <td>
                            <select class="input-control" name="jurusan">
                                <option value="">---Pilih---</option>
                                <option value="Teknik Pengelasan">Teknik Pengelasan</option>
                                <option value="Geologi Pertambangan">Geologi Pertambangan</option>
                                <option value="Rekayasa Perangkat Lunak">Rekayasa Perangkat Lunak</option>
                                <option value="Perhotelan">Perhotelan</option>
                                <option value="Tataboga">Tataboga</option>
                                <option value="Agribisnis Ternak Ruminansia">Agribisnis Ternak Ruminansia</option>
                            </select>
                        </td>
                    </tr>
                </table>
            </div>
            <h3>Data Diri Calon Siswa</h3>
            <div class="box">
                <table class="table-form">
                    <tr>
                        <td>Nama Lengkap</td>
                        <td>:</td>
                        <td>
                            <input type="text" name="nm" class="input-control">
                        </td>
                    </tr>
                    <tr>
                        <td>Tempat Lahir</td>
                        <td>:</td>
                        <td>
                            <input type="text" name="tmp_lahir" class="input-control">
                        </td>
                    </tr>
                    <tr>
                        <td>Tanggal Lahir</td>
                        <td>:</td>
                        <td>
                            <input type="date" name="tgl_lahir" class="input-control">
                        </td>
                    </tr>
                    <tr>
                        <td>Jenis Kelamin</td>
                        <td>:</td>
                        <td>
                            <input type="radio" name="jenis_kelamin" class="input-control" value="Laki-Laki"> Laki-laki &nbsp;&nbsp;&nbsp;
                            <input type="radio" name="jenis_kelamin" class=" input-control" value="Perempuan"> Perempuan
                        </td>
                    </tr>
                    <tr>
                        <td>Agama</td>
                        <td>:</td>
                        <td>
                            <select class="input-control" name="agama">
                                <option value="">---Pilih---</option>
                                <option value="islam">Islam</option>
                                <option value="kristen">Kristen</option>
                                <option value="hindu">Hindu</option>
                                <option value="budha">Budha</option>
                                <option value="katolik">Katolik</option>
                                <option value="khonghucu">Khonghucu</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Alamat Lengkap</td>
                        <td>:</td>
                        <td>
                            <textarea class="input-control" name="alamat"></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td>
                            <input type="submit" name="submit" class="btn-daftar" value="Daftar Sekarang">
                        </td>
                    </tr>
                </table>
            </div>
        </form>
    </section>
    <!--Link bostrap Js-->
    <script src="bootstrap/js/bootstrap.min.js"></script>
</body>

</html>