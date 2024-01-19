<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        h2 {
            margin-top: 20px;
        }

        table {
            width: 80%;
            margin-top: 10px;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #4caf50;
            color: white;
        }

        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
            text-align: center;
            margin-bottom: 20px; /* Tambahkan margin untuk meletakkan form di atas tabel */
        }

        label {
            display: block;
            margin-bottom: 8px;
        }

        input {
            width: 100%;
            padding: 8px;
            margin-bottom: 12px;
            box-sizing: border-box;
        }

        button {
            background-color: #4caf50;
            color: #fff;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }
    </style>
    <title>Data Penerbit</title>
</head>
<body>
        <!-- Data tabel -->
    </table>
    <form action="proses_pengadaan.php" method="post">
        <h2>Form Pengadaan</h2>
        <label for="idpenerbit">ID Penerbit:</label>
        <input type="text" name="idpenerbit" required><br>

        <label for="nama">Nama:</label>
        <input type="text" name="nama" required><br>

        <label for="alamat">Alamat:</label>
        <input type="text" name="alamat" required><br>

        <label for="kota">Kota:</label>
        <input type="text" name="kota" required><br>

        <label for="telepon">Telepon:</label>
        <input type="text" name="telepon" required><br>

        <button type="submit">Submit</button>
    </form>
</body>
</html>
    <?php
    $host = '127.0.0.1';
    $db = 'data';
    $user = 'root';
    $pass = '';

    try {
        $koneksi = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
        $koneksi->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $idpenerbit = isset($_POST['idpenerbit']) ? $_POST['idpenerbit'] : null;
        $nama = isset($_POST['nama']) ? $_POST['nama'] : null;
        $alamat = isset($_POST['alamat']) ? $_POST['alamat'] : null;
        $kota = isset($_POST['kota']) ? $_POST['kota'] : null;
        $telepon = isset($_POST['telepon']) ? $_POST['telepon'] : null;

        // Validasi 'idpenerbit'
        if ($idpenerbit === null || !is_numeric($idpenerbit)) {
            echo "Error: 'idpenerbit' harus diisi dengan nilai numerik yang valid.";
        } elseif ($idpenerbit <= 0) {
            echo "Error: 'idpenerbit' harus memiliki nilai numerik yang lebih besar dari 0.";
        } else {
            // Query untuk menyimpan data ke tabel_penerbit
            $query = "INSERT INTO tabel_penerbit (idpenerbit, nama, alamat, kota, telepon) 
                      VALUES (:idpenerbit, :nama, :alamat, :kota, :telepon)";
            $stmt = $koneksi->prepare($query);

            // Bind parameter
            $stmt->bindParam(':idpenerbit', $idpenerbit);
            $stmt->bindParam(':nama', $nama);
            $stmt->bindParam(':alamat', $alamat);
            $stmt->bindParam(':kota', $kota);
            $stmt->bindParam(':telepon', $telepon);

            // Eksekusi query
            $stmt->execute();

            echo "Data berhasil disimpan.";
        }
    } catch (PDOException $e) {
        // Tangkap kesalahan jika terjadi
        echo "Error: " . $e->getMessage();
    } finally {
        // Tutup koneksi
        $koneksi = null;
    }
    ?>
</body>
</html>
