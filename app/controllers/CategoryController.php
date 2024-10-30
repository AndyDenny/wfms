<?php

namespace app\controllers;

use app\models\Breadcrumbs;
use app\models\Category;
use ishop\App;
use ishop\libs\Pagination;
use RedBeanPHP\R;

class CategoryController extends AppController {
    public function viewAction(){

        $alias = $this->route['alias'];
        $category = R::findOne('category','alias = ?',[$alias]);
        if(!$category){
            throw new \Exception('Category not found', 404);
        }

        $breadcrumbs = Breadcrumbs::getBreadcrumbs($category->id);

        $cat_model =  new Category();
        $ids = $cat_model->getIds($category->id);
        $ids = !$ids ? $category->id : $ids . $category->id;

        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $perPage = App::$app->getProperty('pagination');


        $total = R::count('product',"category_id IN ($ids)");
        $pagination = new Pagination($page, $perPage, $total);

        if($this->isAjax()){
            debug($_GET,1);
        }

        $start = $pagination->getStart();
        $products = R::find('product', "category_id IN ($ids) LIMIT $start, $perPage");
        $this->setMeta($category->title, $category->description, $category->keywords);
        $this->set(compact('products','breadcrumbs', 'pagination','total'));


    }

}