<?php 

$host = "localhost";
$username = "root";
$password = "";
$database = "db_datasiswa";

$koneksi = mysqli_connect($host, $username, $password, $database);

if (!$koneksi) {
    die("koneksi database gagal: " . mysqli_connect_error());
}

$nama = "";
$kelas = "";
$alamat = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST["nama"];
    $kelas = $_POST["kelas"];
    $alamat = $_POST["alamat"];

    $query = "INSERT INTO `students`(`nama`, `kelas`, `alamat`) VALUES ('$nama','$kelas','$alamat')";
    $result = mysqli_query($koneksi, $query);

    if ($result) {
        header("location: index.php");
        exit();
    } else {
        die("gagal menambah data siswa: " . mysqli_error($koneksi));
    }
}

mysqli_close($koneksi);

?>
<!-- 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabel Siswa</title>
</head>
<body>
    <h1>Tabel Siswa</h1>
    <label for="nama">Nama:</label>
    <input type="text" id="nama" name="nama" required>
    <br><br>
    <label for="kelas">Kelas: </label>
    <input type="text" id="kelas" name="kelas" required>
    <br><br>
    <label for="alamat">Alamat: </label>
    <input type="text" id="alamat" name="alamat" required>
    <br><br>
    <input type="submit" value="Simpan">
</form>
<br>
<a href="index.php">Kembali ke tabel siswa</a>
</body>
</html> -->


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HTML dan CSS - Egbert Angenius</title>
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
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <h1 style="text-align: center;">Tambah data</h1>
                <br>
                <label for="nama">Nama</label>
                <input type="text" id="nama" name="nama" required><br>

                <label for="kelas">Kelas</label>
                <input type="text" name="kelas" id="kelas" required><br>

                <label for="alamat">Alamat</label>
                <input type="text" name="alamat" id="alamat" required><br>
                
                <button type="submit">Tambah Data</button>
                <br>
                <a href="index.php" style="text-align: center;">Halaman Siswa</a>
            </form>
        </div>
    </div>
    <div class="footer">
        <p>&copy; 2023 hak cipta dilindungi</p>
    </div>
</body>
</html>