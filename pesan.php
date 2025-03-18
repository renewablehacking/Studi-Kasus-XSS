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
      <h1>Pesan Masuk</h1><br><br>
      <table class="table table-bordered">
        <thead>
          <tr>
            <th scope="col">No</th>
            <th scope="col">Nama</th>
            <th scope="col">Pesan</th>
            <th scope="col">Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php 
          // Query untuk mengambil data dari tabel pesan
          $query = "SELECT * FROM pesan ORDER BY id DESC";
          $result = $conn->query($query);
          
          if ($result->num_rows > 0) {
              $no = 1;
              while ($row = $result->fetch_assoc()) {
                  echo "<tr>
                          <th scope='row'>{$no}</th>
                          <td>" . $row['nama'] . "</td>
                          <td>" . $row['pesan'] . "</td>
                          <td><a href='#' class='btn btn-danger'>Hapus</a></td>
                        </tr>";
                  $no++;
              }
          } else {
              echo "<tr><td colspan='4' class='text-center'>Tidak ada pesan</td></tr>";
          }
          ?>
        </tbody>
      </table>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
