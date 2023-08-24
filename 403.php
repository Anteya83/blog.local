<?php
require_once "src/Base.php";
header('HTTP/1.0 403 Forbidden');
$title = "You don't have permission to access this page, please login";
$content = '403';

require_once 'html/main.php';
