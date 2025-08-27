<?php 
require '../core/middleware.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Article - My Blog</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 font-sans text-gray-800">
    <div class="max-w-4xl mx-auto px-4 py-8">
        <a href="/" class="inline-block text-blue-600 hover:text-blue-800 mb-8 hover:underline">← Back to Blog</a>
        
        <header class="text-center mb-12">
            <h1 class="text-4xl font-bold text-gray-900 mb-2">Create New Article</h1>
            <p class="text-gray-600 text-lg">Share your thoughts and ideas</p>
        </header>

        <div class="bg-white rounded-lg shadow-lg p-8">
            <form action="../core/article-create.php" method="POST" class="space-y-6">
                <div>
                    <label for="title" class="block text-sm font-medium text-gray-700 mb-2">Article Title</label>
                    <input type="text" id="title" name="title" required 
                           placeholder="Enter article title..." 
                           class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                </div>

            

                <div>
                    <label for="content" class="block text-sm font-medium text-gray-700 mb-2">Article Content</label>
                    <textarea id="content" name="content" required rows="12"
                              placeholder="Write your article content here..." 
                              class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 resize-y"></textarea>
                </div>

                <div>
                    <input type="submit" value="Publish Article" 
                           class="bg-blue-600 text-white px-6 py-3 rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 cursor-pointer font-medium">
                </div>
            </form>
        </div>
    </div>
</body>
</html>