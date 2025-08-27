<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: /login.php');
    exit;
}

$username = $_POST['username'] ?? '';
$password = $_POST['password'] ?? '';

// Simple authentication (in production, use hashed passwords)
$valid_username = 'admin';
$valid_password = 'password123';

if ($username === $valid_username && $password === $valid_password) {
    $_SESSION['auth'] = true;
    $_SESSION['username'] = $username;
    header('Location: /');
} else {
    header('Location: /login.php?error=1');
}
exit;
?>