<?php
require_once 'src/Base.php';
$id = $request->id ?? 0;
if (is_numeric($id)) {
    $article = $db->getRowById('article', $id);
    if ($article) {
        $title = $article['title'];
        $content = 'article';
        $comments = $db->getRows('comments', "`article_id`=$id");
    }
    if ($auth_user) {
        if (isset($request->comment)) {
            $comment = $request->comment_text;
            $db->insert('comments', ['user_id', 'comment', 'article_id'], [$auth_user['id'], $comment, $id]);
            header('refresh: 1');
        }
    }
    if (isset($request->delete_comment)) {
        $id_delete = $request->id_comment;
        $db->delete('comments', $id_delete);
        header('refresh: 1');
    }
    require_once 'html/main.php';
    exit;
}


to404();
