<?php 
session_start();

// Check if user is authenticated
if(!isset($_SESSION['auth']) || $_SESSION['auth'] !== true){
    header('Location: /login.php');
    exit;
}
?>