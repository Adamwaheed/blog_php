<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Blog</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 font-sans text-gray-800">
    <div class="max-w-4xl mx-auto px-4 py-8">
        <header class="text-center mb-12">
            <h1 class="text-4xl font-bold text-gray-900 mb-2">My Blog</h1>
            <p class="text-gray-600 text-lg mb-6">Thoughts, ideas, and insights</p>
            
            <?php if(isset($_SESSION["auth"]) && $_SESSION["auth"]) { ?>
                <div class="flex gap-4 justify-center items-center flex-wrap">
                    <a href="admin/create-article.php" class="inline-block bg-blue-600 text-white px-6 py-3 rounded-md hover:bg-blue-700 font-medium transition-colors">
                        + Create New Article
                    </a>
                    <?php if(isset($_SESSION["role"]) && $_SESSION["role"] === 'admin') { ?>
                        <a href="admin/user/users.php" class="inline-block bg-green-600 text-white px-6 py-3 rounded-md hover:bg-green-700 font-medium transition-colors">
                            Manage Users
                        </a>
                    <?php } ?>
                    <a href="core/logout.php" class="inline-block bg-gray-500 text-white px-6 py-3 rounded-md hover:bg-gray-600 font-medium transition-colors">
                        Logout (<?php echo htmlspecialchars($_SESSION["username"]); ?>)
                    </a>
                </div>
            <?php } else { ?>
                <a href="login.php" class="inline-block bg-blue-600 text-white px-6 py-3 rounded-md hover:bg-blue-700 font-medium transition-colors">
                    Login
                </a>
            <?php } ?>
        </header>
        
        <main class="flex flex-col gap-8">
        
            <?php 
            require 'core/db.php';
            $sql = "SELECT * FROM articles order by id desc";
            $result = $conn->query($sql);

            while ($article = $result->fetch_assoc()) {
                include 'component/article.php';
            }
                
            ?>  
        </main>
    </div>

    <!-- Delete Confirmation Modal -->
    <div id="deleteModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full hidden">
        <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white">
            <div class="mt-3 text-center">
                <div class="mx-auto flex items-center justify-center h-12 w-12 rounded-full bg-red-100">
                    <svg class="h-6 w-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L3.732 16.5c-.77.833.192 2.5 1.732 2.5z"/>
                    </svg>
                </div>
                <h3 class="text-lg font-medium text-gray-900 mt-4">Delete Article</h3>
                <div class="mt-2 px-7 py-3">
                    <p class="text-sm text-gray-500">
                        Are you sure you want to delete this article? This action cannot be undone.
                    </p>
                </div>
                <div class="items-center px-4 py-3">
                    <button id="confirmDelete" 
                            class="px-4 py-2 bg-red-500 text-white text-base font-medium rounded-md w-24 mr-2 hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-300">
                        Delete
                    </button>
                    <button id="cancelDelete" 
                            class="px-4 py-2 bg-gray-300 text-gray-800 text-base font-medium rounded-md w-24 hover:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-gray-300">
                        Cancel
                    </button>
                </div>
            </div>
        </div>
    </div>

    <script>
        let deleteUrl = '';
        const deleteModal = document.getElementById('deleteModal');
        const confirmDelete = document.getElementById('confirmDelete');
        const cancelDelete = document.getElementById('cancelDelete');

        // Show modal
        function showDeleteModal(url) {
            deleteUrl = url;
            deleteModal.classList.remove('hidden');
        }

        // Hide modal
        function hideDeleteModal() {
            deleteModal.classList.add('hidden');
            deleteUrl = '';
        }

        // Confirm delete
        confirmDelete.addEventListener('click', function() {
            if (deleteUrl) {
                window.location.href = deleteUrl;
            }
        });

        // Cancel delete
        cancelDelete.addEventListener('click', hideDeleteModal);

        // Close modal when clicking outside
        deleteModal.addEventListener('click', function(e) {
            if (e.target === deleteModal) {
                hideDeleteModal();
            }
        });
    </script>
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