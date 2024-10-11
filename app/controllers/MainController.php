<?php

namespace app\controllers;

use ishop\App;
use ishop\Cache;
use RedBeanPHP\R;

class MainController extends AppController
{

    public function indexAction(){
//        $this->setMeta(App::$app->getProperty('shop_name'), 'MainPageDescription', 'MainPageKeywords');
        $this->setMeta('MainPageTitle', 'MainPageDescription', 'MainPageKeywords');
    }

}