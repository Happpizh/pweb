<?php
$host = 'localhost';
$user = 'root';
$password = '';
$dbname = 'nonton_film';

$conn = new mysqli($host, $user, $password, $dbname);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
?>