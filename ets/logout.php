<?php
setcookie('user_id', '', time() - 3600);
setcookie('role', '', time() - 3600);
header("Location: login.php");
?>
