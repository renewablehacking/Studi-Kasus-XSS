<?php
session_start();

// Koneksi ke database (Menggunakan MySQLi)
$conn = new mysqli("localhost", "root", "", "pre-test");

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Cek apakah pengguna sudah login
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}
?>
<!doctype html>
<html lang="id">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Dashboard</title>
  </head>
  <body>

  <a href="dashboard.php">Home</a> | <a href="pesan.php">Lihat Pesan</a> | <a href="logout.php">Log Out</a>
    <div class="container mt-4">
      <h1>Selamat datang di Dashboard</h1><br><br>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
