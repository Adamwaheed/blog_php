<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog Post - My Blog</title>
    <link rel="stylesheet" href="asset/view-styles.css">
</head>
<body>

        <?php 
            require 'core/db.php';

            $id= $_GET['id'];

             $sql = "SELECT * FROM articles where id =".$id;
            $result = $conn->query($sql);
            $article = $result->fetch_assoc();
 
           
        ?>           
    <div class="container">
        <a href="/" class="back-link">Back to Blog</a>
        <article>
            <header class="post-header">
                <h1 class="post-title"><?=$article['title']?></h1>
                <div class="post-meta">
                    <time datetime="2024-03-15">March 15, 2024</time>
                    <span class="separator">•</span>
                    <span>5 min read</span>
                    <span class="separator">•</span>
                    <span>Web Development</span>
                </div>
            </header>
            
            <div class="post-content">
                <?php echo $article['content']; ?>
            </div>
            
            <nav class="post-navigation">
                <a href="/" class="nav-home">← Back to All Posts</a>
            </nav>
        </article>
    </div>
</body>
</html>