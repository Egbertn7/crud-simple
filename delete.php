<?php

$host = "localhost";
$username = "root";
$password = "";
$database = "db_datasiswa";

$koneksi = mysqli_connect($host, $username, $password, $database);

if (!$koneksi) {
    die("koneksi database gagal: " . mysqli_connect_error());
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $query = "DELETE FROM `students` WHERE id = '$id'";
    $result = mysqli_query($koneksi, $query);

    if ($result) {
        // Memeriksa apakah ada data yang dihapus sebelum di-redirect
        if (mysqli_affected_rows($koneksi) > 0) {
            header("location: index.php");
            exit();
        } else {
            die("Data siswa tidak ditemukan.");
        }
    } else {
        die("gagal menghapus datasiswa: " . mysqli_error($koneksi));
    }
} else {
    die("id siswa tidak ditemukan");
}

mysqli_close($koneksi);

?>
