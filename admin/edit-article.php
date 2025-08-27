<?php
require '../core/middleware.php';
require '../core/db.php';


$id = $_GET['id'];
$sql = "SELECT * FROM articles WHERE id = " . $id;
$result = $conn->query($sql);
$article = $result->fetch_assoc();

if (!$article) {
    header('Location: /');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Article - My Blog</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 font-sans text-gray-800">
    <div class="max-w-4xl mx-auto px-4 py-8">
        <a href="/" class="inline-block text-blue-600 hover:text-blue-800 mb-8 hover:underline">← Back to Blog</a>
        
        <header class="text-center mb-12">
            <h1 class="text-4xl font-bold text-gray-900 mb-2">Edit Article</h1>
            <p class="text-gray-600 text-lg">Update your article</p>
        </header>

        <div class="bg-white rounded-lg shadow-lg p-8">
            <form action="../core/article-edit.php" method="POST" class="space-y-6">
                <input type="hidden" name="id" value="<?= $article['id'] ?>">
                
                <div>
                    <label for="title" class="block text-sm font-medium text-gray-700 mb-2">Article Title</label>
                    <input type="text" id="title" name="title" required 
                           value="<?= htmlspecialchars($article['title']) ?>"
                           placeholder="Enter article title..." 
                           class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                </div>

                <div>
                    <label for="content" class="block text-sm font-medium text-gray-700 mb-2">Article Content</label>
                    <textarea id="content" name="content" required rows="12"
                              placeholder="Write your article content here..." 
                              class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 resize-y"><?= htmlspecialchars($article['content']) ?></textarea>
                </div>

                <div class="flex gap-4">
                    <input type="submit" value="Update Article" 
                           class="bg-blue-600 text-white px-6 py-3 rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 cursor-pointer font-medium">
                    <a href="/" class="bg-gray-300 text-gray-700 px-6 py-3 rounded-md hover:bg-gray-400 font-medium text-center">
                        Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>