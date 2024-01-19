<?php
// Menggantilah ini dengan koneksi database Anda
$koneksi = mysqli_connect("127.0.0.1", "root", "", "data");

// Periksa koneksi
if (mysqli_connect_errno()) {
    echo "Koneksi database gagal: " . mysqli_connect_error();
    exit();
}

// Pastikan bahwa indeks "id" ada dalam array (contoh)
if (isset($_POST['idbuku'])) {
    $id = $_POST['idbuku'];

    // Pastikan bahwa tabel 'tb_produk' ada dalam database 'data'
    $query = "SELECT * FROM tb_buku WHERE idbuku= $idbuku";
    $result = mysqli_query($koneksi, $query);

    if ($result) {
        // Lakukan sesuatu dengan hasil query
        // ...
    } else {
        // Tampilkan pesan kesalahan jika query gagal
        echo "Error: " . mysqli_error($koneksi);
    }
} else {
    echo "Error: ID tidak ditemukan";
}

// Tutup koneksi database
mysqli_close($koneksi);
?>
