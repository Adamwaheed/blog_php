<?php 
require 'middleware.php';
require 'db.php';

$title = trim($_POST['title']);
$content = trim($_POST['content']);
$category_id = !empty($_POST['category_id']) ? intval($_POST['category_id']) : null;
$created_at = date("Y-m-d H:i:s");

$stmt = $conn->prepare("INSERT INTO articles (title, content, category_id, created_at) VALUES (?, ?, ?, ?)");
$stmt->bind_param("ssis", $title, $content, $category_id, $created_at);

if ($stmt->execute()) {
    header("Location: ../admin/create-article.php?success=1");
    exit();
} else {
    echo "Error: " . $conn->error;
}

$stmt->close();
$conn->close();
?>