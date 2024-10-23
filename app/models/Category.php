<?php

namespace app\models;

use ishop\App;

class Category extends AppModel{

    public function getIds($id){
        $categories = App::$app->getProperty('categories');
        $ids = NULL;
        foreach($categories as $catId => $catArray){
            if($catArray['parent_id'] == $id){
                $ids .= $catId . ',';
                $ids .= $this->getIds($catId);
            }
        }
        return $ids;
    }

}