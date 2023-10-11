<?php

$host = "localhost";
$username = "root";
$password = "";
$database = "db_datasiswa";

// membuat koneksi ke database supaya jalan
$koneksi = mysqli_connect($host, $username, $password, $database);

// memeriksa hasil koneksi
if (!$koneksi) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}

// memeriksa paramenter id siswa 
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $query = "SELECT * FROM students WHERE id = '$id'";
    $result = mysqli_query($koneksi, $query);

    if (mysqli_num_rows($result) > 0) {
        $siswa = mysqli_fetch_assoc($result);
        $nama = $siswa['nama'];
        $kelas = $siswa['kelas'];
        $alamat = $siswa['alamat'];
    } else {
        die("Data siswa tidak ditemukan.");
    }
} else {
    die("Parameter id siswa tidak diberikan.");
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['nama']) && isset($_POST['kelas']) && isset($_POST['alamat'])) {
        $nama = $_POST['nama'];
        $kelas = $_POST['kelas'];
        $alamat = $_POST['alamat'];

        // sedang update data siswa
        $query = "UPDATE students SET nama = '$nama', kelas = '$kelas', alamat = '$alamat' WHERE id = '$id'";
        $result = mysqli_query($koneksi, $query);

        if ($result) {
            header("Location: index.php");
            exit();
        } else {
            die("Gagal mengubah data siswa: " . mysqli_error($koneksi));
        }
    } else {
        die("Data yang diperlukan tidak lengkap.");
    }
}

// menutup koneksi
mysqli_close($koneksi);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ubah Data - Egbert Angenius</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="navbar">
        <div class="container">
            <ul>
                <li><a href="home.php">Beranda</a></li>
                <li><a href="index.php">Siswa</a></li>
            </ul>
        </div>
    </div>
    <div class="content">
        <div>
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"] . '?id=' . $id); ?>">
                <h1 style="text-align: center;">Ubah data data</h1>

                <label for="nama">Nama:</label>
                <input type="text" name="nama" value="<?php echo $nama; ?>"><br>
                <label for="kelas">Kelas:</label>
                <input type="text" name="kelas" value="<?php echo $kelas; ?>"><br>
                <label for="alamat">Alamat:</label>
                <input type="text" name="alamat" value="<?php echo $alamat; ?>"><br>
                <input type="submit" value="Simpan">

            </form>
        </div>
    </div>
    <div class="footer">
        <p>&copy; 2023 hak cipta dilindungi</p>
    </div>
</body>

</html>