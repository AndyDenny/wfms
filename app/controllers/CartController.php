<?php

namespace app\controllers;

use app\models\Cart;
use RedBeanPHP\R;

class CartController extends AppController
{
    public function addAction(){
        $id = !empty($_POST['id']) ? $_POST['id'] : null;
        $qty = !empty($_POST['qty']) ? $_POST['qty'] : null;
        $mod_id = !empty($_POST['mod']) ? $_POST['mod'] : null;
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
        $cart = new Cart();
        $cart->addToCart($product, $qty, $mod);
        if($this->isAjax()){
            $this->loadView('cart_modal');
        }
        redirect();
    }
}