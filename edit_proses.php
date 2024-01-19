<?php
// koneksi database 
include 'koneksi.php';

$idbuku = $_POST['idbuku'];
$namabuku = $_POST['namabuku'];
$harga = $_POST['harga'];
$stok = $_POST['stok'];

mysqli_query($koneksi, "UPDATE tabel_buku SET namabuku='$namabuku', harga='$harga', stok='$stok' WHERE idbuku='$idbuku'");
?>
