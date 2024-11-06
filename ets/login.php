<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $remember = isset($_POST['remember']);

    $result = $conn->query("SELECT * FROM users WHERE username='$username'");
    $user = $result->fetch_assoc();

    if ($user && $password === $user['password']) {
        $cookie_time = $remember ? time() + (30 * 24 * 60 * 60) : 0;

        setcookie('user_id', $user['id'], $cookie_time);
        setcookie('role', $user['role'], $cookie_time);

        header("Location: index.php");
    } else {
        echo "Username atau password salah.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="logreg.css">
</head>
<body>
    <div id="login">
        <h1>LOGIN</h1>
        <div class = "menu-login">
            <form method="post">
                <div class="uss-pw">
                    <label>Username:</label>
                    <br>
                    <input type="text" name="username" required>
                    <br>
                    <br>
                    <label>Password:</label><br>
                    <input type="password" name="password" required>
                </div>
                <br>
                <br>
                <label>
                    <input type="checkbox" name="remember"> Remember Me
                </label>
                <br>
                <br>
                
                <div class="log-button">
                    <button type="submit">Login</button>
                    <button type="button" onclick="window.open('register.php', '_blank')">Register</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
