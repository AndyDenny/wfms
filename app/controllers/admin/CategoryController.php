<?php

namespace app\controllers\admin;

use app\models\AppModel;
use app\models\Category;
use ishop\App;
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
            if(!$category->validate($data)){
                $category->getErrors();
                redirect();
            }
            if($id = $category->save('category')){
                $alias = AppModel::createAlias('category', 'alias', $data['title'], $id);
                $catg = R::load('category', $id);
                $catg->alias = $alias;
                R::store($catg);
                $_SESSION['success'] = "Категория `{$data['title']}` добавлена";
            }
            redirect();
        }
        $this->setMeta('Добавить категорию');
    }

    public function editAction()
    {
        if(!empty($_POST)){
            $id = $this->getRequestID(false);
            $category = new Category();
            $data = $_POST;
            $category->load($data);
            if(!$category->validate($data)){
                $category->getErrors();
                redirect();
            }
            if($category->update('category',$id)){
                $alias = AppModel::createAlias('category', 'alias', $data['title'], $id);
                $catg = R::load('category', $id);
                $catg->alias = $alias;
                R::store($catg);
                $_SESSION['success'] = "Категория `{$data['title']}` обновлена";
            }
            redirect();
        }

        $id = $this->getRequestID();
        $category = R::load('category',$id);
        App::$app->setProperty('parent_id', $category->parent_id);
        $this->setMeta("Редактирование категории {$category->title}");
        $this->set(compact('category'));
    }
}