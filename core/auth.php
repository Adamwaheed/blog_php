<?php
session_start();
include 'db.php';


$username = $_POST['username'] ?? '';
$password = $_POST['password'] ?? '';

if (empty($username) || empty($password)) {
    header('Location: /login.php?error=empty_fields');
    exit;
}

$stmt = $conn->prepare("SELECT id, username, password, role FROM users WHERE username = ?");
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 1) {
    $user = $result->fetch_assoc();
    
    if (password_verify($password, $user['password'])) {
        $_SESSION['auth'] = true;
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        $_SESSION['role'] = $user['role'];
        header('Location: /');
    } else {
        header('Location: /login.php?error=invalid_credentials');
    }
} else {
    header('Location: /login.php?error=invalid_credentials');
}

$stmt->close();
$conn->close();
exit;
?>