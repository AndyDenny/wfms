<?php

define("DEBUG", 1);
define("ROOT", dirname(__DIR__));
define("WWW", ROOT . '/piblic');
define("APP", ROOT . '/app');
define("CORE", ROOT . '/vendor/ishope/core');
define("LIBS", ROOT . '/vendor/ishope/core/libs');
define("CACHE", ROOT . '/tmp/cache');
define("CONF", ROOT . '/config');
define("LAYOUT", 'deafult');

$app_path = "http://{$_SERVER['HTTP_HOST']}{$_SERVER['PHP_SELF']}";
$app_path = preg_replace("#[^/]+$#",'', $app_path);
$app_path = str_replace('/public/', '',$app_path);
define("PATH",$app_path);
define("ADMIN", PATH . '/admin');

require_once ROOT . '/vendor/autoload.php';