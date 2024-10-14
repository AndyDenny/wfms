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
        $brands = R::find('brand','LIMIT 3');
        $hits = R::find('product',"hit = '1' AND status = '1' ");
        $this->set(compact('brands','hits'));
    }

}