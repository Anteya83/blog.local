<?php
require_once 'src/Base.php';
$title = "Articles";
$content = 'articles';
$articles = $db->getRows('article');
require_once 'html/main.php';
