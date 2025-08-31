<?php
define('BASE_URL', 'http://localhost:8080/blog_php-1');

function redirect($path = '') {
    $url = BASE_URL . '/' . ltrim($path, '/');
    header("Location: $url");
    exit();
}

function url($path = '') {
    return BASE_URL . '/' . ltrim($path, '/');
}
?>