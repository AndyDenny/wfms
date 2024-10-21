<?php

namespace app\controllers;

use RedBeanPHP\R;

class CartController extends AppController
{
    public function addAction(){
        $id = !empty($_POST['id']) ?? null;
        $qty = !empty($_POST['qty']) ?? null;
        $mod_id = !empty($_POST['mod']) ?? null;
        $mod = null;
        if($id){
            $product = R::findOne('product', 'id = ?', [$id]);
            if(!$product){
                return false;
            }
            if($mod_id){
                $mod = R::findOne('modification' , 'id = ? AND product_id = ?', [$mod_id, $id]);
            }
        }
        die();
    }
}