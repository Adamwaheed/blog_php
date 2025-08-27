<article class="bg-white rounded-lg shadow-lg p-6 hover:shadow-xl transition-shadow duration-200 hover:-translate-y-1 transform transition-transform">
                <div class="flex justify-between items-start mb-2">
                    <h2 class="text-xl font-semibold flex-1">
                        <a href="view.php?id=<?= $article['id']?>" class="text-gray-900 hover:text-blue-600 transition-colors"><?=$article['title']?></a>
                    </h2>
                    <?php if(isset($_SESSION["auth"]) && $_SESSION["auth"]) { ?>
                    <div class="flex gap-2 ml-4">
                        <a href="admin/edit-article.php?id=<?= $article['id']?>" class="text-yellow-600 hover:text-yellow-800 text-sm font-medium">
                            Edit
                        </a>
                        <button onclick="showDeleteModal('core/delete-article.php?id=<?= $article['id']?>')"
                                class="text-red-600 hover:text-red-800 text-sm font-medium">
                            Delete
                        </button>
                    </div>
                    <?php } ?>
                </div>
                <div class="text-gray-600 text-sm mb-4">
                    <time datetime="2024-03-15"><?= $article['created_at']?></time> • <?=getTimeAgo($article['created_at']) ?>
                </div>
            <p class="text-gray-700 leading-relaxed mb-4">
                 <?= getExcerpt($article['content']) ?>
            </p>
            <a href="view.php?id=<?= $article['id']?>" class="text-blue-600 hover:text-blue-800 font-medium hover:underline">Read more →</a>
 </article>



 
