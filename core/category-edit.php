<?php 
require 'config.php';
require 'middleware.php';
require 'db.php';

$id = $_POST['id'];
$name = trim($_POST['name']);
$description = trim($_POST['description']);

$stmt = $conn->prepare("UPDATE categories SET name = ?, description = ? WHERE id = ?");
$stmt->bind_param("ssi", $name, $description, $id);

if ($stmt->execute()) {
    redirect("admin/edit-category.php?id=$id&success=1");
} else {
    echo "Error: " . $conn->error;
}

$stmt->close();
$conn->close();
?>