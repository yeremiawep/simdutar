<?php
include '../../../config/database.php';
session_start();

$id = $_POST['id_users'];
$nip = $_POST['nip'];
$nama = $_POST['nama'];
$jabatan = $_POST['jabatan'];
$password = $_POST['password'];

// var_dump($nip);
// var_dump($id);
// var_dump($nama);
// var_dump($jabatan);
// die();

$insert = mysqli_query($conn, "UPDATE users SET nip='$nip', nama='$nama', jabatan='$jabatan', password='$password' WHERE id_users='$id'");

if ($insert) {
  $_SESSION["sukses"] = 'Data Berhasil Disimpan';
} else {
  $_SESSION["gagal"] = 'Gagal Menyimpan Data';
}

header('Location: ../../../app/index.php?page=data-pegawai');
