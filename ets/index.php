<?php
include 'db.php';

if (!isset($_COOKIE['user_id'])) {
    header("Location: login.php");
    exit;
}

$role = $_COOKIE['role'];
$result = $conn->query("SELECT * FROM movies");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Website Nonton Film</title>
    <link rel="stylesheet" href="index.css">
</head>
<body>
        <!-- <div class="navbar">
            <div class="logo">
                <h1><span class="yellowfont">Nonton</span>Yuks</h1>
            </div>
            <div class="nav-point">
                <?php if ($role == 'admin') { ?>
                    <a href="create.php">Tambah Film Baru</a>
                    <?php } ?>
                    <a href="logout.php">Logout</a>
                </div>
            </div> -->
        
    <div class="main-container">
        <div class="nav">
            <div class="logo">
                <h1><span class="yellowfont">Nonton</span>Yuks</h1>
            </div>
            <nav>
                <ul>
                <?php if ($role == 'admin') { ?>
                    <li><a href="create.php">Tambah Film Baru</a></li>
                <?php } ?>
                <li><a href="logout.php">Logout</a></li>
                </ul>
            </nav>
        </div>
    </div>

    <div id="body">
        <div class="grid-film">
            <?php while ($movie = $result->fetch_assoc()) { ?>
                <div class="film-point">
                    <div class="film-cover">
                    <img src="cover/<?php echo $movie['cover']; ?>" width="100" />
                    </div>
                    <br>
                    <div class="film-info">
                        <h1><?php echo $movie['title']; ?></h1>
                        <br>
                        <br>
                        <h3>Studio : <?php echo $movie['agency']; ?></h3>
                        <br>
                        <!-- <video width="100" controls>
                            <source src="video/<?php echo $movie['video']; ?>" type="video/mp4">
                        </video> -->
                        <h3>Genre : <?php echo $movie['kategori']; ?></h3>
                        <br>
                        <p>Deskripsi : <?php echo $movie['deskripsi']; ?></p>
                        <br>
                        <br>
                        <br>
                        <div class="opsi">
                            <a href="video/<?php echo $movie['video']; ?>" download>Download</a>
                            <?php if ($role == 'admin') { ?>
                                <a href="update.php?id=<?php echo $movie['id']; ?>">Edit</a>
                                <a href="delete.php?id=<?php echo $movie['id']; ?>">Hapus</a>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</body>
</html>
