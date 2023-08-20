<?php
include '../../../config/database.php';
session_start();

$id_periode = $_POST['id_periode'];
$tahun = $_POST['tahun'];
$status = $_POST['status'];

// var_dump($nip);
// var_dump($id);
// var_dump($nama);
// var_dump($jabatan);
// die();

$insert = mysqli_query($conn, "UPDATE periode SET tahun='$tahun', status='$status' WHERE id_periode='$id_periode'");

if ($insert) {
  $_SESSION["sukses"] = 'Data Berhasil Disimpan';
} else {
  // $_SESSION["failed"] = 'Gagal Menyimpan Data';
}

header('Location: ../../../app/index.php?page=periode');
