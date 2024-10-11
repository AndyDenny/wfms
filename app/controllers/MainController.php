<?php

namespace app\controllers;

use ishop\App;
use ishop\Cache;
use RedBeanPHP\R;

class MainController extends AppController
{

    public function indexAction(){
        $posts = R::findAll('test');
//        $this->setMeta(App::$app->getProperty('shop_name'), 'MainPageDescription', 'MainPageKeywords');
        $this->setMeta('MainPageTitle', 'MainPageDescription', 'MainPageKeywords');
$name = "John";
$age = 32;
$names = ['Andy','Jane','Mike'];
$cache = Cache::instance();
//$cache->delete('test');
        $data = $cache->get('test');
        if (!$data){
            $cache->set('test', $names);
        }
        debug($data);
        $this->set(compact('name','age', 'names','posts'));
    }

}