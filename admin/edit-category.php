<?php 
require '../core/middleware.php';
require '../core/db.php';

if (!isset($_GET['id'])) {
    header("Location: categories.php");
    exit();
}

$id = $_GET['id'];
$result = $conn->query("SELECT * FROM categories WHERE id = $id");

if ($result->num_rows == 0) {
    header("Location: categories.php");
    exit();
}

$category = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Category - My Blog</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 font-sans text-gray-800">
    <div class="max-w-4xl mx-auto px-4 py-8">
        <a href="/admin/categories.php" class="inline-block text-blue-600 hover:text-blue-800 mb-8 hover:underline">← Back to Categories</a>
        
        <header class="text-center mb-12">
            <h1 class="text-4xl font-bold text-gray-900 mb-2">Edit Category</h1>
            <p class="text-gray-600 text-lg">Update category information</p>
        </header>

        <div class="bg-white rounded-lg shadow-lg p-8">
            <?php if (isset($_GET['success'])): ?>
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
                    Category updated successfully!
                </div>
            <?php endif; ?>

            <form action="../core/category-edit.php" method="POST" class="space-y-6">
                <input type="hidden" name="id" value="<?= $category['id'] ?>">
                
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Category Name</label>
                    <input type="text" id="name" name="name" required 
                           value="<?= htmlspecialchars($category['name']) ?>"
                           placeholder="Enter category name..." 
                           class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                </div>

                <div>
                    <label for="description" class="block text-sm font-medium text-gray-700 mb-2">Description</label>
                    <textarea id="description" name="description" rows="4"
                              placeholder="Enter category description..." 
                              class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 resize-y"><?= htmlspecialchars($category['description']) ?></textarea>
                </div>

                <div>
                    <input type="submit" value="Update Category" 
                           class="bg-blue-600 text-white px-6 py-3 rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 cursor-pointer font-medium">
                </div>
            </form>
        </div>
    </div>
</body>
</html>