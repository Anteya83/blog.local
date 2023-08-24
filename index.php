<?php
require_once 'src/Base.php';
$title = "My_BLOG";
$content = 'index';
$articles = $db->getCountRows('article');
$users = $db->getCountRows('users');
$comments =  $db->getCountRows('comments');

$shortArticles = $db->getRows('article');
//$id = $request->id ?? 0;

require_once 'html/main.php';
