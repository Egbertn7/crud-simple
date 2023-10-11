<?php 
$host = "localhost";
$username = "root";
$password = "";
$database = "db_datasiswa";

$koneksi = mysqli_connect($host, $username, $password, $database);

if (!$koneksi) {
    die("koneksi database gagal: " . mysqli_connect_error());
}

$query = "SELECT * FROM students";
$result = mysqli_query($koneksi, $query);

mysqli_close($koneksi);
?>

<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabel Siswa</title>
</head>
<body>
    <h1>Tabel Siswa</h1>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>Kelas</th>
            <th>Alamat</th>
            <th>Aksi</th>
        </tr> -->

    <!-- </table>
    <br>
    <a href="create.php">Tambah siswa</a>
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
            <h1>Data Siswa</h1>
            <a href="create.php">
                <h3>Tambah data</h3>
            </a>

            <table>
                <tr>
                    <th>Id</th>
                    <th>Nama</th>
                    <th>kelas</th>
                    <th>Alamat</th>
                    <th>Aksi</th>
                </tr>
                <tr>
                <?php 
        $i = 1; 
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $i++ . "</td>";
            echo "<td>" . $row["nama"] . "</td>"; 
            echo "<td>" . $row["kelas"] . "</td>"; 
            echo "<td>" . $row["alamat"] . "</td>"; 
            echo "<td>";
            echo "<a href='delete.php?id=" . $row['id'] . "'>hapus</a> |";
            echo "<a href='update.php?id=" . $row['id'] . "'>edit</a>";
            echo "</td>";
            echo "</tr>";
        }
        ?>
                </tr>
            </table>
        </div>
    </div>
    <div class="footer">
        <p>&copy; 2023 hak cipta dilindungi</p>
    </div>
</body>
</html>