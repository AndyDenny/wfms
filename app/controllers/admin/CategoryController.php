<?php

namespace app\controllers\admin;

use app\models\Category;
use RedBeanPHP\R;

class CategoryController extends AppController{

    public function indexAction(){

        $this->setMeta("Список категорий");
    }

    public function deleteAction(){
        $id = $this->getRequestID();
        $children = R::count('category', 'parent_id = ?', [$id]);
        $errors = '';
        if ($children){
            $errors .= '<li>Удаление невозможно - присутствют вложенные категории</li>';
        }
        $products = R::count('product', 'category_id = ?', [$id]);
        if ($products){
            $errors .= '<li>Удаление невозможно - присутствют вложенные товары</li>';
        }
        if ($errors){
            $_SESSION['errors'] = "<ul>$errors</ul>";
            redirect();
        }
        $category = R::load('category',$id);
        R::trash($category);
        $_SESSION['success'] = "Категория удалена";
        redirect();
    }

    public function addAction(){
        if(!empty($_POST)){
            $category = new Category();
            $data = $_POST;
            $category->load($data);
            if($category->validate($data)){
                $category->getErrors();
                redirect();
            }
            if($id = $category->save('category')){

            }
        }
        $this->setMeta('Добавить категорию');
    }
}