<h1>My blog</h1>
<h4>Welcome!!!</h4>

<ul>

    <?php foreach ($shortArticles as $shortArticle) {
        $commentsToThatArticle = $db->getCountRows('comments', "`article_id`=" . $shortArticle['id']);
    ?>
        <li><a href="article.php?id=<?= $shortArticle['id'] ?>">
                <?= $shortArticle['title'] ?> </a>
            <p><?= $shortArticle['shot_article'] ?><a href='article.php?id=<?= $shortArticle['id'] ?>'>...continue reading</a></p>
            <p>Comments to that article: <?= $commentsToThatArticle ?></p>
        </li>

    <?php } ?>
</ul>
<p>In my blog already:</p>
<ul>
    <li>Articles:<?= $articles ?></li>
    <li>Users:<?= $users ?></li>
    <li>Comment:<?= $comments ?></li>


</ul>
<!-- краткие версии всех постов (вместе с ссылкой на полную версию), количество комментариев рядом с каждым из постов. 
Внизу страницы должна отображаться сводная статистика: общее количество постов, комментариев, пользователей.-->