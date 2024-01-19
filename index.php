<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Produk - Toko Ardiansyah</title>
    <style>
        body {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
        }
        fieldset {
            width: 80%;
            margin: auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        h1 {
            text-align: center;
        }
        a {
            display: block;
            text-align: center;
            margin-bottom: 10px;
            text-decoration: none;
            color: #333;
            font-weight: bold;
        }
        form {
            text-align: center;
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        td {
            height: 40px;
        }
        nav {
            text-align: center;
        }
        nav ul {
            list-style: none;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        nav ul li {
            margin: 0 15px;
        }
        nav ul li a {
            text-decoration: none;
            color: black;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <fieldset> 
        <!--Judul pada fieldset--> 
        <legend align="center">Data Produk</legend>
        <h1>Selamat datang di toko Ardiansyah</h1>
        <a href="tambah_form.html">Tambah Data</a>

        <form method="GET" action="index.php">
            <label for="kata_cari">Kata Pencarian : </label>
            <input type="text" name="kata_cari" id="kata_cari" value="<?php echo isset($_GET['kata_cari']) ? htmlspecialchars($_GET['kata_cari']) : ''; ?>" />
            <button type="submit">Cari</button>
        </form>

        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="admin.php">Admin</a></li>
                <li><a href="pengadaan.php">Pengadaan</a></li>
            </ul>
        </nav>

        <table>
            <thead> 
                <tr> 
                    <th>idbuku</th> 
                    <th>kategori</th> 
                    <th>namabuku</th> 
                    <th>harga</th> 
                    <th>stok</th>
                    <th>penerbit</th>
                    <th>Opsi</th> <!-- Kolom baru untuk opsi -->
                </tr> 
            </thead> 
            <tbody> 
                <?php 
                include 'koneksi.php';

                if(isset($_GET['kata_cari'])) {
                    $kata_cari = $_GET['kata_cari'];
                    $query = "SELECT * FROM tabel_buku WHERE idbuku LIKE '%".$kata_cari."%' OR namabuku LIKE '%".$kata_cari."%' ORDER BY idbuku ASC";
                } else {
                    $query = "SELECT * FROM tabel_buku ORDER BY idbuku ASC"; 
                }

                $result = mysqli_query($koneksi, $query); 

                if(!$result) { 
                    die("Query Error : ".mysqli_errno($koneksi)." - ".mysqli_error($koneksi)); 
                }

                //kalau ini melakukan foreach atau perulangan 
                while ($row = mysqli_fetch_assoc($result)) {
                ?>
                <tr> 
                    <td><?php echo $row['idbuku']; ?></td> 
                    <td><?php echo $row['kategori']; ?></td> 
                    <td><?php echo $row['namabuku']; ?></td> 
                    <td><?php echo $row['harga']; ?></td>
                    <td><?php echo $row['stok']; ?></td> 
                    <td><?php echo $row['penerbit']; ?></td> 
                    <!--Tambahan untuk opsi edit dan hapus--> 
                    <td> 
                        <a href="edit_form.php?idbuku=<?php echo $row['idbuku']; ?>">EDIT</a> 
                        <a href="delete.php?idbuku=<?php echo $row['idbuku']; ?>">HAPUS</a> 
                    </td> 
                </tr>
                <?php
                }
                ?>
            </tbody> 
        </table> 
    </fieldset> 
</body> 
</html>
