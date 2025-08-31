<?php 
require 'config.php';
require 'middleware.php';
require 'db.php';

$name = trim($_POST['name']);
$description = trim($_POST['description']);
$created_at = date("Y-m-d H:i:s");

$stmt = $conn->prepare("INSERT INTO categories (name, description, created_at) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $name, $description, $created_at);

if ($stmt->execute()) {
    redirect('admin/create-category.php?success=1');
} else {
    echo "Error: " . $conn->error;
}

$stmt->close();
$conn->close();
?>