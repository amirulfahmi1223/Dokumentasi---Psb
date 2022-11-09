<?php
//Membuat koneksi database
$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'db_psb';


$conn = mysqli_connect($host, $user, $pass, $db);
if (!$conn) {
    echo "koneksi gagal : " . mysqli_connect_error($conn);
}
