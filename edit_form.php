<!DOCTYPE html>
<html>
<head>
    <title>Form Edit Data</title>
    <style>
        fieldset {
            width: 400px;
            margin: auto;
        }
    </style>
</head>
<body>
    <fieldset>
        <!--Judul pada fieldset-->
        <legend align="center">Edit Data Produk</legend>
        <h3>Edit Data</h3>

        <?php
        include "koneksi.php"; // Pastikan file ini ada dan konfigurasi koneksi sudah benar

        $idbuku = $_GET['idbuku'];

        // Lakukan escape string pada variabel $idbuku untuk mencegah SQL injection
        $idbuku = mysqli_real_escape_string($koneksi, $idbuku);

        $edit = mysqli_query($koneksi, "SELECT * FROM tabel_buku WHERE idbuku='$idbuku'");

        while ($row = mysqli_fetch_array($edit)) {
        ?>
        <form method="post" action="edit_proses.php">
            <table>
                <tr>
                    <td>Nama Produk</td>
                    <td>
                        <input type="hidden" name="idbuku" value="<?php echo $row['idbuku']; ?>">
                        <input type="text" name="idbuku" value="<?php echo $row['idbuku']; ?>">
                    </td>
                </tr>
                <tr>
                    <td>Harga</td>
                    <td>
                        <input type="text" name="harga" value="<?php echo $row['harga']; ?>">
                    </td>
                </tr>
                <tr>
                <tr>
    <td>Stok</td>
    <td>
        <input type="text" name="stok" value="<?php echo $row['stok']; ?>">
    </td>
</tr>

<tr>
    <td>Penerbit</td>
    <td>
        <input type="text" name="penerbit" value="<?php echo $row['penerbit']; ?>">
    </td>
</tr>
                </tr>
                <tr>
                    <td><input type="submit" value="SIMPAN"></td>
                </tr>
            </table>
        </form>
        <?php
        }
        ?>
    </fieldset>
</body>
</html>
