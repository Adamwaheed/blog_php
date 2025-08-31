<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog Post - My Blog</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 font-sans text-gray-800">

        <?php 
            require 'core/config.php';
            require 'core/db.php';

            $id= $_GET['id'];

             $sql = "SELECT * FROM articles where id =".$id;
            $result = $conn->query($sql);
            $article = $result->fetch_assoc();
 
           
        ?>           
    <div class="max-w-4xl mx-auto px-4 py-8">
        <a href="<?= url('') ?>" class="inline-block text-blue-600 hover:text-blue-800 mb-8 hover:underline">← Back to Blog</a>
        <article class="bg-white rounded-lg shadow-lg p-8">
            <header class="mb-8">
                <h1 class="text-3xl font-bold text-gray-900 mb-4"><?=$article['title']?></h1>
                <div class="text-gray-600 text-sm">
                    <time datetime="2024-03-15">March 15, 2024</time>
                    <span class="mx-2">•</span>
                    <span>5 min read</span>
                    <span class="mx-2">•</span>
                    <span>Web Development</span>
                </div>
            </header>
            
            <div class="prose prose-lg max-w-none text-gray-700 leading-relaxed">
                <?php echo $article['content']; ?>
            </div>
            
            <nav class="mt-8 pt-8 border-t border-gray-200">
                <a href="<?= url('') ?>" class="text-blue-600 hover:text-blue-800 hover:underline">← Back to All Posts</a>
            </nav>
        </article>
    </div>
</body>
</html>