<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $role = $_POST['role'];

    $conn->query("INSERT INTO users (username, password, role) VALUES ('$username', '$password', '$role')");
    header("Location: login.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Registrasi</title>
    <link rel="stylesheet" href="logreg.css">
</head>
<body>
    <div id="regis">
        <h1>REGISTRASI</h1>
        <div class="regis-menu">
            <form method="post">
                <div class="usr-pwr">
                    <label>Username:</label><br>
                    <input type="text" name="username" required>
                    <br>
                    <br>
                    <label>Password:</label><br>
                    <input type="password" name="password" required>
                    <br>
                    <br>
                </div>
                <label>Role:</label>
                <br>
                <select name="role">
                    <option value="user">User</option>
                    <option value="admin">Admin</option>
                </select>
                <br>
                <br>
                <div class="reg-button">
                    <button type="submit">Register</button>
                    <button type="button" onclick="window.open('login.php', '_blank')">Login</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
