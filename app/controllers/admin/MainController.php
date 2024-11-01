<?php

namespace app\controllers\admin;

use app\controllers\admin\AppController;
use RedBeanPHP\R;

class MainController extends AppController {

    public function indexAction(){
        $counNewOrders = R::count('order',"status = '0'");
        $countUsers = R::count('user');
        $countProducts = R::count('product');
        $countCategories = R::count('category');
        $this->setMeta('AdminMainPageTitle', 'AdminMainPageDescription', 'AdminMainPageKeywords');
        $this->set(compact('counNewOrders','countUsers','countProducts','countCategories'));
    }



}