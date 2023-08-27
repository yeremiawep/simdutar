<?php
include '../../../config/database.php';
session_start();

$tahun = $_POST['tahun'];
$status = $_POST['status'];

// var_dump($tahun);
// var_dump($status);

$insert = mysqli_query($conn, "INSERT INTO periode (id_periode, tahun, status) VALUES ('','$tahun','$status')");

if ($insert) {
  $_SESSION["sukses"] = 'Data Berhasil Disimpan';
} else {
  $_SESSION["gagal"] = 'Gagal Menyimpan Data';
}

header('Location: ../../../app/index.php?page=periode');
