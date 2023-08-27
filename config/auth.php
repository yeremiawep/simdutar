<?php
session_start();
include "database.php";

$nip = $_POST['nip'];
$password = $_POST['password'];

$query = mysqli_query($conn, "SELECT * FROM users WHERE nip='$nip' AND password='$password'");

if (mysqli_num_rows($query) == 1) {
  header('Location:../app/index.php?page=dashboard');
  $user = mysqli_fetch_array($query);
  $_SESSION['id_user'] = $user['id_users'];
  $_SESSION['user'] = $user['nama'];
  $_SESSION['nip'] = $user['nip'];
  $_SESSION['jabatan'] = $user['jabatan'];
} else if ($nip == '' || $password == '') {
  header('Location:../index.php?error=2');
} else {
  header('Location:../index.php?error=1');
}
