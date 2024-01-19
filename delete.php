<?php 
include 'koneksi.php'; 
// menyimpan data id kedalam variabel 
$id = $_GET['idbuku']; 
// query SQL untuk delete data 
$query = "DELETE FROM tabel_buku WHERE idbuku='$idbuku'";
mysqli_query($koneksi, $query); 
// mengalihkan ke halaman index.php 
header("location: index.php"); 
?>
