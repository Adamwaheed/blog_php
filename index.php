<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Blog</title>
    <link rel="stylesheet" href="asset/styles.css">
</head>
<body>
    <div class="container">
        <header>
            <h1>My Blog</h1>
            <p class="subtitle">Thoughts, ideas, and insights</p>
        </header>
        
        <main class="blog-posts">
        
            <?php 
            require 'core/db.php';
            $sql = "SELECT * FROM articles";
            $result = $conn->query($sql);

            while ($article = $result->fetch_assoc()) {
                include 'component/article.php';
            }
                
            ?>  
        </main>
    </div>
</body>
</html>

<?php 
function getTimeAgo(string $dateString): string {
    $timestamp = strtotime($dateString);
    $diff = time() - $timestamp;

    if ($diff < 60) {
        return $diff . " sec ago";
    } elseif ($diff < 3600) {
        return floor($diff / 60) . " min ago";
    } elseif ($diff < 86400) {
        return floor($diff / 3600) . " hr ago";
    } elseif ($diff < 2592000) {
        return floor($diff / 86400) . " days ago";
    } elseif ($diff < 31536000) {
        return floor($diff / 2592000) . " months ago";
    } else {
        return floor($diff / 31536000) . " years ago";
    }
}



/**
 * Get excerpt of an article
 *
 * @param string $content  The article content (may contain HTML)
 * @param int    $length   Number of characters for excerpt
 * @return string          Excerpt with "..." at the end
 */
function getExcerpt(string $content, int $length = 150): string {
    // Remove HTML tags
    $plainText = strip_tags($content);

    // If text is shorter than limit, return as is
    if (strlen($plainText) <= $length) {
        return $plainText;
    }

    // Cut text and trim to last space (avoid cutting words)
    $excerpt = substr($plainText, 0, $length);
    $excerpt = substr($excerpt, 0, strrpos($excerpt, ' '));

    return $excerpt . '...';
}
?>