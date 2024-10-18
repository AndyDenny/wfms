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

        $related = R::getAll('SELECT * FROM related_product JOIN product ON product.id = related_product.related_id WHERE related_product.product_id = ?',[$product->id]);

//        TODO - vatched products

        $gallery = R::findAll('gallery', 'product_id = ? ', [$product->id]);

//        TODO - modification product

        $this->setMeta($product->title,$product->description,$product->keywords);
        $this->set(compact('product','related', 'gallery'));
    }
}