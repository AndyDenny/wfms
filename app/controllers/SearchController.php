<?php

namespace app\controllers;

use RedBeanPHP\R;

class SearchController extends AppController{

    public function typeaheadAction(){
        echo 111;
        if ($this->isAjax()){
            $query = !empty(trim($_POST['query'])) ? trim($_POST['query']) : NULL ;
            if($query){
                $products = R::getAll('SELECT id, name FROM product WHERE title LIKE ? LIMIT 9',["%{$query}%"]);
                echo json_encode($products);
            }
        }
        die();
    }

}