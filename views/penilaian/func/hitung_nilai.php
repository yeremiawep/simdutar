<?php

include '../../../config/database.php';
session_start();

$id = $_POST['id_user'];
$kriteria = $_POST['id_kriteria'];
$nilai = $_POST['nilai'];
$periode = $_POST['periode'];
$count = count($nilai);

$total = array_sum($nilai);
$nilai_akhir = $total / $count;

// var_dump($id);
// var_dump($nilai);
// var_dump($kriteria);
// var_dump($total);
// var_dump($periode);
// var_dump($count);
// var_dump($nilai_akhir);
// die();

for ($i = 0; $i < $count; $i++) {
  @$periode[$i] = $periode;
}

$cek = mysqli_query($conn, "SELECT * FROM penilaian WHERE id_user='$id[0]' AND periode='$periode[0]'");
if (mysqli_num_rows($cek) == 0) {
  for ($i = 0; $i < $count; $i++) {
    $insert = "INSERT INTO detail_nilai VALUES ('', '$id[$i]', '$kriteria[$i]', '$nilai[$i]', '$periode[$i]')";
    $sql = mysqli_query($conn, $insert);
  }

  $insertna = "INSERT INTO penilaian VALUES ('', '$id[0]', '$total', '$nilai_akhir', '$periode[0]')";
  $sql = mysqli_query($conn, $insertna);
}


if ($sql) {
  $_SESSION['sukses'] = 'Berhasil Input Nilai';
} else {
  $_SESSION['gagal'] = 'Data sudah pernah diinput';
}

header('Location: ../../../app/index.php?page=penilaian');
