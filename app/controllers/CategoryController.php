<?php

namespace app\controllers;

use app\models\Category;
use ishop\App;
use RedBeanPHP\R;

class CategoryController extends AppController {
    public function viewAction(){

        $alias = $this->route['alias'];
        $category = R::findOne('category','alias = ?',[$alias]);
        if(!$category){
            throw new \Exception('Category not found', 404);
        }
        $breadcrumbs = '';
        $cat_model =  new Category();
        $ids = $cat_model->getIds($category->id);
        $ids = !$ids ? $category->id : $ids . $category->id;

        $products = R::find('product', "category_id IN ($ids)");
        $this->setMeta($category->title, $category->description, $category->keywords);
        $this->set(compact('products','breadcrumbs'));


    }

}