<?php


namespace app\controllers;


use RedBeanPHP\R;

class ProductController extends AppController
{
    public function viewAction(){
        $alias = $this->route['alias'];
        $product = R::findOne('product','alias = ? AND status = "1"',[$alias]);
        if(!$product){
            throw new \Exception('Product not found or not exist...',404);
        }
//        TODO - breadcrumbs
//        TODO - recommended products
//        TODO - vatched products
//        TODO - gallery
//        TODO - modification product

        $this->setMeta($product->title,$product->description,$product->keywords);
        $this->set(compact('product'));
    }
}