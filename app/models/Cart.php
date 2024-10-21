<?php

namespace app\models;

/*
 * session['cart']
    [
        [1] =>
                [
                    [qty] => QTY
                    [name] => NAME
                    [price] => PRICE
                    [img] => img
                ],
        [10] =>
                [
                    [qty] => QTY
                    [name] => NAME
                    [price] => PRICE
                    [img] => img
                ],
          [qty] => QTY,
          [sum] => SUM
    ]
     */

use ishop\App;

class Cart extends AppModel{
    public function addToCart($product, $qty = 1, $mod = null)
    {
        if(!isset($_SESSION['cart.currency'])){
            $_SESSION['cart.currency'] = App::$app->getProperty('currency');
        }
        if($mod){
            $ID = "{$product->id}-{$mod->id}";
            $title = "{$product->title} ({$mod->title})";
            $price = $mod->price;
        }else{
            $ID = $product->id;
            $title = $product->title;
            $price = $product->price;
        }
        if($_SESSION['cart'][$ID]){ // Notice: Undefined index: 1-3 in \domains\wfms\app\models\Cart.php on line 44
            $_SESSION['cart'][$ID]['qty'] += $qty;
        }else{
            $_SESSION['cart'][$ID] = [
                'qty' => $qty,
                'title' => $title,
                'alias' => $product->alias,
                'price' => $price * $_SESSION['cart.currency']['value'],
                'img' => $product->img
            ];
        }
        $_SESSION['cart.qty'] = isset($_SESSION['cart.qty']) ? $_SESSION['cart.qty'] + $qty : $qty;
        $_SESSION['cart.sum'] = isset($_SESSION['cart.sum']) ? $_SESSION['cart.sum'] + $qty * ($price * $_SESSION['cart.currency']['value']) : $qty * ($price * $_SESSION['cart.currency']['value']);
    }

}