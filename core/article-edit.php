<?php
require 'config.php';
require 'middleware.php';
require 'db.php';


$id = $_POST['id'];
$title = $_POST['title'];
$content = $_POST['content'];


// Update article
$sql = "UPDATE articles SET title = '$title', content = '$content' WHERE id = $id";

if ($conn->query($sql) === TRUE) {
    redirect('');
} else {
    echo "Error updating article: " . $conn->error;
}

$conn->close();
?>