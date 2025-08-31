<?php 
require 'middleware.php';
require 'db.php';

if (!isset($_GET['id'])) {
    header("Location: ../admin/categories.php");
    exit();
}

$id = $_GET['id'];

$stmt = $conn->prepare("DELETE FROM categories WHERE id = ?");
$stmt->bind_param("i", $id);

if ($stmt->execute()) {
    header("Location: ../admin/categories.php");
    exit();
} else {
    echo "Error: " . $conn->error;
}

$stmt->close();
$conn->close();
?>