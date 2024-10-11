<?php

namespace app\controllers;

use ishop\App;
use RedBeanPHP\R;

class MainController extends AppController
{

    public function indexAction(){
        $posts = R::findAll('test');
//        $this->setMeta(App::$app->getProperty('shop_name'), 'MainPageDescription', 'MainPageKeywords');
        $this->setMeta('MainPageTitle', 'MainPageDescription', 'MainPageKeywords');
$name = "John";
$age = 32;
$names = ['Andy','Jane'];
        $this->set(compact('name','age', 'names','posts'));
    }

}