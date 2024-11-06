<?php
include 'db.php';

if (!isset($_COOKIE['user_id']) || $_COOKIE['role'] != 'admin') {
    header("Location: index.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $agency = $_POST['agency'];

    // yabf kutambahin tadi
    $kategori = $_POST['kategori'];
    $deskripsi = $_POST['deskripsi'];
    // selesai ini kutambahin
    
    
    $cover = $_FILES['cover']['name'];
    $video = $_FILES['video']['name'];

    // Pindahkan file cover ke folder 'cover'
    move_uploaded_file($_FILES['cover']['tmp_name'], "cover/" . $cover);

    // Pindahkan file video ke folder 'video'
    move_uploaded_file($_FILES['video']['tmp_name'], "video/" . $video);

    // Simpan informasi film ke dalam database
    $conn->query("INSERT INTO movies (title, agency, kategori, deskripsi, cover, video) VALUES ('$title', '$agency', '$kategori', '$deskripsi', '$cover', '$video')");
    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah Film</title>
    <link rel="stylesheet" href="create.css">
</head>
<body>
    <h1>Tambah Film Baru</h1>
    <form method="post" enctype="multipart/form-data">
        <label>Judul:</label><br>
        <input type="text" name="title" required><br><br>
        
        <label>Agensi:</label><br>
        <input type="text" name="agency" required><br><br>
        
        <!-- yang kutambahin tadi -->
        <label>kategori:</label><br>
        <input type="text" name="kategori" required><br><br>
        <div class="deskripsi">
            <label>deskripsi:</label><br>
            <input type="text" name="deskripsi" required><br><br>
        </div>
        <!-- seleai ini kutambahin -->
        
        
        <label>Sampul:</label><br>
        <input type="file" name="cover" required><br><br>
        
        <label>Video:</label><br>
        <input type="file" name="video" required><br><br>
        
        <button type="submit">Simpan</button>
    </form>
</body>
</html>
