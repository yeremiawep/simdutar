<?php
include '../../../config/database.php';
session_start();

$nip = $_POST['nip'];
$nama = $_POST['nama'];
$jabatan = $_POST['jabatan'];

// var_dump($nip);
// var_dump($nama);
// var_dump($jabatan);

$insert = mysqli_query($conn, "INSERT INTO users (id_users, nip, nama, jabatan) VALUES ('','$nip','$nama','$jabatan')");

if ($insert) {
  $_SESSION["sukses"] = 'Data Berhasil Disimpan';
} else {
  $_SESSION["gagal"] = 'Gagal Menyimpan Data';
}

header('Location: ../../../app/index.php?page=data-pegawai');
