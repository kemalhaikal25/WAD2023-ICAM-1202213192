<!-- File ini berisi koneksi dengan database yang telah di import ke phpMyAdmin kalian -->


<?php
// Buatlah variable untuk connect ke database yang telah di import ke phpMyAdmin
$host = "localhost:3308";
$username = "root";
$password = "";
$database = "MODUL3_WAD";

$conn = mysqli_connect($host, $username, $password, $database);

  
// Buatlah perkondisian jika tidak bisa terkoneksi ke database maka akan mengeluarkan errornya
if (!$conn) {
    die("Koneksi ke database gagal: " . mysqli_connect_error());
} 

// 
?>