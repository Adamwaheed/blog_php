<?php 
require 'middleware.php';
require 'db.php';

$title = $_POST['title'];
$content = $_POST['content'];
$created_at =  date("Y-m-d");

$sql = "INSERT INTO articles (title, content, created_at) 
                     VALUES ('$title', '$content','$created_at')";

if ($conn->query($sql) === TRUE) {
    // Redirect on success
    header("Location: http://localhost:7090/admin/create-article.php?success=1");
    exit();
} else {
    echo "Error: " . $conn->error;
}

$conn->close();


?>

<h1><?= $title ?></h1>
<h1><?= $content ?></h1>
<h1><?= $created_at ?></h1>