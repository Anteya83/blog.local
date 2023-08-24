<h1><?= $article['title'] ?></h1>
<hr>

<p><?= $article['article'] ?></p>
<p>Date of creation: <?= $article['date'] ?></p>
<hr>
<h4>Comments</h4>
<?php foreach ($comments as $comment) {
    $userName = $db->getRowById('users', $comment['user_id']);

?>
    <hr>
    <p><b> <?= $userName['login'] ?></b></p>
    <p> <?= $comment['comment'] ?></p>
    <p> <?= $comment['date_comment'] ?></p>
    <?php
    $time_comment_plus3h = strtotime($comment['date_comment']) + 10800;

    if ($auth_user) {
        if ((($comment['user_id'] == $auth_user['id']) && (time() < $time_comment_plus3h) || $auth_user['id'] == 3)) { ?>
            <form name="delete_comment" action="" method="post">
                <p><input type="submit" name="delete_comment" value="DELETE"></p>
                <input type="hidden" name="id_comment" value="<?= $comment['id'] ?>">
            </form>
    <?php }
    } ?>

    </hr>
    </ul>
<?php }
if ($auth_user) { ?>
    <div>
        <form name="comment" action="" method="post">
            <fieldset>
                <legend>Your comment</legend>
                <textarea name="comment_text" id="" cols="20" rows="10" style="width:852px; height:162px;"></textarea>
                <p><input type="submit" name="comment" value="Send"></p>
            </fieldset>
        </form>
    </div>
<?php } else { ?>
    <h3>Only authorized users can comment</h3>
<?php } ?>