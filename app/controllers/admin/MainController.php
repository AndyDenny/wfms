<?php

namespace app\controllers\admin;

use app\controllers\admin\AppController;
use RedBeanPHP\R;

class MainController extends AppController {

    public function indexAction(){

        $this->setMeta('AdminMainPageTitle', 'AdminMainPageDescription', 'AdminMainPageKeywords');
    }

}