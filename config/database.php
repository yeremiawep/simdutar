<?php

$hostname = 'localhost';
$username = 'root';
$database = 'sim_dutar';
$password = '';

$conn = mysqli_connect($hostname, $username, $password, $database);

// if (!$conn) {
//   die("Koneksi Gagal:" .  mysqli_connect_error());
// } else {
//   echo "Connected";
// }
