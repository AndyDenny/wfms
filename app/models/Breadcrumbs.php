<?php

namespace app\models;

use ishop\App;

class Breadcrumbs{

    public static function getBreadcrumbs($category_id, $name = ''){
        $categories = App::$app->getProperty('categories');
        $breadcrumbs_array = self::getParts($categories, $category_id);
        $breadcrumbs = "<li><a href='". PATH ."/'>Home</a></li>";
        if($breadcrumbs_array){
            foreach ($breadcrumbs_array as $alias => $title){
                $breadcrumbs .= "<li><a href='". PATH ."/category/{$alias}'>{$title}</a></li>";
            }
        }
        if($name){
            $breadcrumbs .= "<li>{$name}</li>";
        }
        return $breadcrumbs;
    }

    public static function getParts($categories, $id){
        if(!$id){
            return false;
        }
        $breadcrumbs = [];
        foreach($categories as $category){
            if($id){                                                                // $id = 7
                $breadcrumbs[$categories[$id]['alias']] = $categories[$id]['title']; // [ ['citizen'] => ['Citizen'] ]
                $id = $categories[$id]['parent_id'];                                // $id = 4
            }else{
                break;
            }
        }
        return array_reverse($breadcrumbs);
    }


}