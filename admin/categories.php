<?php 
require '../core/config.php';
require '../core/middleware.php';
require '../core/db.php';

$categories = $conn->query("SELECT * FROM categories ORDER BY created_at DESC");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Categories - My Blog</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 font-sans text-gray-800">
    <div class="max-w-6xl mx-auto px-4 py-8">
        <a href="<?= url('') ?>" class="inline-block text-blue-600 hover:text-blue-800 mb-8 hover:underline">← Back to Blog</a>
        
        <header class="text-center mb-12">
            <h1 class="text-4xl font-bold text-gray-900 mb-2">Manage Categories</h1>
            <p class="text-gray-600 text-lg">Create, edit, and organize your blog categories</p>
        </header>

        <div class="bg-white rounded-lg shadow-lg p-8 mb-8">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-2xl font-bold text-gray-900">Categories</h2>
                <a href="create-category.php" class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                    Add New Category
                </a>
            </div>

            <?php if ($categories->num_rows > 0): ?>
                <div class="overflow-x-auto">
                    <table class="w-full table-auto">
                        <thead>
                            <tr class="bg-gray-50">
                                <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                                <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Description</th>
                                <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Created</th>
                                <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            <?php while($category = $categories->fetch_assoc()): ?>
                            <tr>
                                <td class="px-4 py-4 whitespace-nowrap">
                                    <div class="text-sm font-medium text-gray-900"><?= htmlspecialchars($category['name']) ?></div>
                                </td>
                                <td class="px-4 py-4">
                                    <div class="text-sm text-gray-500 max-w-xs truncate"><?= htmlspecialchars($category['description']) ?></div>
                                </td>
                                <td class="px-4 py-4 whitespace-nowrap text-sm text-gray-500">
                                    <?= date('M j, Y', strtotime($category['created_at'])) ?>
                                </td>
                                <td class="px-4 py-4 whitespace-nowrap text-sm font-medium">
                                    <a href="edit-category.php?id=<?= $category['id'] ?>" class="text-indigo-600 hover:text-indigo-900 mr-4">Edit</a>
                                    <a href="../core/delete-category.php?id=<?= $category['id'] ?>" class="text-red-600 hover:text-red-900" 
                                       onclick="return confirm('Are you sure you want to delete this category?')">Delete</a>
                                </td>
                            </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                </div>
            <?php else: ?>
                <div class="text-center py-8">
                    <p class="text-gray-500 text-lg mb-4">No categories found.</p>
                    <a href="create-category.php" class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                        Create Your First Category
                    </a>
                </div>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>