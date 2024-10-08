<?php

require_once dirname(__DIR__) . "/config/init.php";
require_once LIBS . "/functions.php";
require_once CONF . "/routes.php";

new \ishop\App();
//debug(\ishop\App::$app->getPropertiers());
//throw new Exception('Pagge NOT founde', 44);
//debug(\ishop\Router::getRoutes());