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
  <link rel="stylesheet" href="bootstrap/css/bootstrap.css" />
</head>
<style>
  body {
    background-color: #f8f8f8;
  }

  .container {
    background-color: #fff;
  }
</style>

<body>
  <div class="container">
    <h2 class="alert alert-primary text-bl text-center mt-3">FORMULIR PENDAFTARAN SISWA BARU</h2>
  </div>
  <form action="" method="POST">
    <div class="container">
      <!-- bagian tahun ajaran -->
      <div class="form-group">
        <label>Tahun Ajaran</label>
        <input type="text" name="th_ajaran" class="form-control" value="2022/2023" readonly>
      </div><br>
      <!-- bagian jurusan -->
      <div class="row">
        <div class="form-group">
          <label>Jurusan</label>
          <select class="form-control" name="jurusan">
            <option value="">---Pilih---</option>
            <option value="Teknik Pengelasan">Teknik Pengelasan</option>
            <option value="Geologi Pertambangan">Geologi Pertambangan</option>
            <option value="Rekayasa Perangkat Lunak">Rekayasa Perangkat Lunak</option>
            <option value="Perhotelan">Perhotelan</option>
            <option value="Tataboga">Tataboga</option>
            <option value="Agribisnis Ternak Ruminansia">Agribisnis Ternak Ruminansia</option>
          </select>
        </div>
      </div><br>

      <h5 class="alert alert-success text-center mt-3">DATA DIRI CALON SISWA</h5>
      <!--Bagian nama lengkap-->
      <div class="form-group">
        <label>Nama Lengkap</label>
        <input type="text" name="nm" class="form-control" placeholder="Masukkan Nama Lengkap Anda" id="tempat-lahir">
      </div>
      <br>
      <!--Bagian Tempat lahir-->
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label>Tempat Lahir</label>
            <input type="text" name="tmp_lahir" class="form-control" placeholder="Masukkan Tempat Lahir Anda" id="tempat-lahir">
          </div>
        </div><br>
        <!-- bagian tanggal lahir -->
        <div class="col-md-6">
          <div class="form-group">
            <label>Tanggal Lahir</label>
            <input type="date" name="tgl_lahir" class="form-control" placeholder="Masukkan Tanggal Lahir Anda">
          </div>
        </div>
      </div><br>
      <!-- bagian jenis kelamin -->
      <div class=" form-group">
        <label>Jenis Kelamin</label><br>
        <div class="form-check-inline">
          <input type="radio" class="form-check-input" name="jenis_kelamin" id="radio2" value="Laki-Laki">
          <label>Laki-Laki</label>
        </div>
        <div class="form-check-inline">
          <input type="radio" class="form-check-input" name="jenis_kelamin" id="radio2" value="Perempuan">
          <label>Perempuan</label>
        </div>
      </div><br>
      <div class="form-grup">
        <label>Agama</label>
        <select class="form-control" name="agama">
          <option value=""">--Pilih--</option>
          <option value=" Islam">Islam</option>
          <option value="Kristen">Kristen</option>
          <option value="Katolik">Katolik</option>
          <option value="Hindu">Hindu</option>
          <option value="Budha">Budha</option>
          <option value="Khonghucu">Khonghucu</option>
        </select>
      </div><br>
      <!--Bagian Alamat-->
      <div class="form-grup">
        <label>Alamat Lengkap</label>
        <textarea name="alamat" class="form-control" rows="5"></textarea>
      </div><br>
      <!--Bagian Button-->
      <input type="submit" class="btn btn-primary w-25" name="submit" value="Daftar Sekarang">
      <input type="reset" class="btn btn-danger w-25" value="Reset">
  </form>
  <div class="p-3"></div>
  </div><br><br>
  <!--Link bostrap Js-->
  <script src="bootstrap/js/bootstrap.min.js"></script>
</body>

</html>