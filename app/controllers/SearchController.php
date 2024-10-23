<?php

namespace app\controllers;

use RedBeanPHP\R;

class SearchController extends AppController{

    public function typeaheadAction(){
        if ($this->isAjax()){
            $query = !empty(trim($_POST['query'])) ? trim($_POST['query']) : NULL ;
            if($query){
                $products = R::getAll('SELECT id, name FROM product WHERE title LIKE ? LIMIT 9',["%{$query}%"]);
                echo json_encode($products);
            }
        }
        die();
    }

    public function indexAction(){
        $query = !empty(trim($_POST['s'])) ? trim($_POST['s']) : NULL;
        if($query){
            $products = R::find('product','title LIKE ?',["%{$query}%"]);
            $query = hsc($query);
            $this->setMeta("Search of '{$query}' ");
            $this->set(compact('products', 'query'));
        }

    }
}