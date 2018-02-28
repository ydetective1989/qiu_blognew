<?php
session_start();
unset($_SESSION['name']);
echo '<a href="session.php">登录</a>';
?>
