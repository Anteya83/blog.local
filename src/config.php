<?php
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);

session_start();

define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'My_blog');
define('DB_PREFIX', 'blog_');


define('DATE_FORMAT', 'd.m.Y H:i:s');
define('SALT', '12345');

define('USER', 0);
define('ADMIN', 1);

set_include_path(get_include_path() . PATH_SEPARATOR . 'src');
spl_autoload_register();
