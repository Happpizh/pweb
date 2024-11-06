<?php
include 'db.php';
$id = $_GET['id'];

$movie = $conn->query("SELECT * FROM movies WHERE id=$id")->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $agency = $_POST['agency'];
    
    // kutambahin
    $kategori = $_POST['kategori'];
    $deskripsi = $_POST['deskripsi'];
    // seleai kutambahin

    $cover = $movie['cover'];
    $video = $movie['video'];

    if ($_FILES['cover']['name']) {
        $cover = $_FILES['cover']['name'];
        move_uploaded_file($_FILES['cover']['tmp_name'], 'uploads/' . $cover);
    }
    if ($_FILES['video']['name']) {
        $video = $_FILES['video']['name'];
        move_uploaded_file($_FILES['video']['tmp_name'], 'uploads/' . $video);
    }

    $conn->query("UPDATE movies SET title='$title', agency='$agency', kategori='$kategori', deskripsi='$deskripsi', cover='$cover', video='$video' WHERE id=$id");
    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Film</title>
    <link rel="stylesheet" href="update.css">
</head>
<body>
    <h1>Edit Film</h1>
    <form method="post" enctype="multipart/form-data">
        <label>Judul Film:</label><br>
        <input type="text" name="title" value="<?php echo $movie['title']; ?>" required><br><br>
        
        <label>Agensi:</label><br>
        <input type="text" name="agency" value="<?php echo $movie['agency']; ?>"><br><br>
        
        <!-- yang kutambahin tadi -->
        <label>kategori:</label><br>
        <input type="text" name="kattegori" value="<?php echo $movie['kategori']; ?>"><br><br>
        <div class="deskripsi">
            <label>deskripsi:</label><br>
            <input type="text" name="deskripsi" value="<?php echo $movie['deskripsi']; ?>"><br><br>
        </div>
        <!-- selelsai kutambahin -->
        
        <label>Sampul:</label><br>
        <input type="file" name="cover"><br><br>
        
        <label>Video:</label><br>
        <input type="file" name="video"><br><br>
        
        <button type="submit">Simpan</button>
    </form>
</body>
</html>
