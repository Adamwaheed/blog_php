<?php 
require 'config.php';
require 'middleware.php';
require 'db.php';

if (!isset($_GET['id'])) {
    redirect('admin/categories.php');
}

$id = $_GET['id'];

$stmt = $conn->prepare("DELETE FROM categories WHERE id = ?");
$stmt->bind_param("i", $id);

if ($stmt->execute()) {
    redirect('admin/categories.php');
} else {
    echo "Error: " . $conn->error;
}

$stmt->close();
$conn->close();
?>