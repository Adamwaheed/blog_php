<?php
include '../../core/db.php';
include '../../core/middleware.php';

$id = $_GET['id'];

$query = "DELETE FROM users WHERE id = $id";

if ($conn->query($query)) {
    header("Location: users.php");
} else {
    echo "Error deleting user";
}
?>