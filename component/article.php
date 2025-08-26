<article class="post-card">
                <h2 class="post-title">
                    <a href="view.php?id=<?= $article['id']?>"><?=$article['title']?></a>
                </h2>
                <div class="post-meta">
                    <time datetime="2024-03-15"><?= $article['created_at']?></time> • <?=getTimeAgo($article['created_at']) ?>
                </div>
            <p class="post-excerpt">
                 <?= getExcerpt($article['content']) ?>
            </p>
            <a href="view.php?id=<?= $article['id']?>" class="read-more">Read more →</a>
 </article>



 
