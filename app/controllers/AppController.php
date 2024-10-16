<?php

namespace app\controllers;

use app\models\AppModel;
use app\widgets\currency\Currency;
use ishop\App;
use ishop\base\Controller;
use ishop\Cache;
use RedBeanPHP\R;

class AppController extends Controller
{
    public function __construct($route)
    {
        parent::__construct($route);
        new AppModel();
        App::$app->setProperty('currencies', Currency::getCurrencies());
        $now_curr = Currency::getCurrency(App::$app->getProperty('currencies'));
        App::$app->setProperty('currency',$now_curr);
        App::$app->setProperty('categories', self::cacheCategory());
    }

    public static function cacheCategory(){
        $cache = Cache::instance();
        $categories = $cache->get('categories');
        if(!$categories){
            $categories = R::getAssoc('SELECT * FROM category');
            $cache->set('categories',$categories);
        }
        return $categories;
    }
}