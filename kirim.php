<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Koneksi ke database
$conn = new mysqli("localhost", "root", "", "pre-test");

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Ambil data dari form
$name = $_POST["nama"];
$message = $_POST["pesan"];

// Gunakan prepared statement untuk mencegah SQL Injection
$stmt = $conn->prepare("INSERT INTO pesan (nama, pesan) VALUES (?, ?)");
$stmt->bind_param("ss", $name, $message);
$stmt->execute();
$stmt->close();

// Redirect kembali ke index.php
header("Location: index.php");
exit;
?>
