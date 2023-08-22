<?php

include '../../../config/database.php';
session_start();

$id = $_POST['id_user'];
$nilai = $_POST['nilai'];
$periode = $_POST['periode'];
$count = count($nilai);

$total = array_sum($nilai);
$nilai_akhir = $total / $count;

var_dump($id);
var_dump($nilai);
var_dump($total);
var_dump($periode);
var_dump($count);
var_dump($nilai_akhir);


$cek = mysqli_query($conn, "SELECT * FROM penilaian WHERE id_user='$id[0]' AND periode='$periode[0]'");
if (mysqli_num_rows($cek) == 0) {
  $insert = "INSERT INTO penilaian VALUES ('', '$id[0]', '$total', '$nilai_akhir', '$periode')";
  $sql = mysqli_query($conn, $insert);
}

if ($sql) {
  $_SESSION['sukses'] = 'Berhasil Input Nilai';
} else {
  $_SESSION['gagal'] = 'Data sudah pernah diinput';
}

header('Location: ../../../app/index.php?page=penilaian');
