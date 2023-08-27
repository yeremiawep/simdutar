<?php
include '../../../config/database.php';
session_start();

$id = $_GET['id'];


$query = mysqli_query($conn, "DELETE FROM penilaian WHERE id_nilai='$id'");

if ($query) {
  $_SESSION['sukses'] = "Deleted";
} else {
  $_SESSION['gagal'] = "Failed";
}

header('Location: ../../../app/index.php?page=rekap-nilai');
