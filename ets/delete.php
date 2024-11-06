<?php
include 'db.php';
$id = $_GET['id'];

$movie = $conn->query("SELECT * FROM movies WHERE id=$id")->fetch_assoc();
unlink('uploads/' . $movie['cover']);
unlink('uploads/' . $movie['video']);

$conn->query("DELETE FROM movies WHERE id=$id");
header("Location: index.php");
?>
