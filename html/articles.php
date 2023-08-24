<h1>All Articles</h1>

<ul>
    <?php foreach ($articles as $article) { ?>
        <li>
            <a href="article.php?id=<?= $article['id'] ?>">
                <?= $article['title'] ?> </a>
            <p> <?= $article['shot_article'] ?>...</p>
        </li>

    <?php } ?>
</ul>