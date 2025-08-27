<?php
require 'middleware.php';
require 'db.php';

// Check if 'id' is provided and is numeric
// if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = (int) $_GET['id'];

    // Use prepared statement to prevent SQL injection
    $stmt = $conn->prepare("DELETE FROM articles WHERE id = ?");
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        $stmt->close();
        $conn->close();
        header("Location: http://localhost:7090");
        exit(); // always exit after redirect
    } else {
        echo "Error deleting record: " . $conn->error;
    }
// } else {
    // echo "Invalid ID.";
// }
?>
