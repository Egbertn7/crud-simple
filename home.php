<?php 

$host = "localhost";
$username = "root";
$password = "";
$database = "db_datasiswa";

$koneksi = mysqli_connect($host, $username, $password, $database);

if (!$koneksi) {
    die("koneksi database gagal: " . mysqli_connect_error());
}

?>

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
            <h1>Selamat Datang!</h1>
            <p>Selamat datang di situs kami. Kami berharap anda menikmati kunjungan anda!</p>
        </div>
    </div>
    <div class="footer">
        <p>&copy; 2023 hak cipta dilindungi</p>
    </div>
</body>
</html>