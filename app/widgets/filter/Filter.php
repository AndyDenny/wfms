<?php

namespace app\widgets\filter;

use ishop\Cache;
use RedBeanPHP\R;

class Filter{

    public $groups;
    public $attributes;
    public $tpl;

    public function __construct(){
        $this->tpl = __DIR__ . '/filter_tpl.php';
        $this->run();
    }

    public function run(){
        $cache = Cache::instance();
        $this->groups = $cache->get('filter_group');
        if(!$this->groups){
            $this->groups =  $this->getGroups();
            $cache->set('filter_group',$this->groups,1);
        }
        $this->attributes = $cache->get('filter_attributes');
        if(!$this->attributes){
            $this->attributes =  self::getAttributes();
            $cache->set('filter_attributes',$this->attributes,1);
        }
        $filters = $this->getHtml();
        echo $filters;
    }

    protected function getGroups(){
        return R::getAssoc('SELECT id, title FROM attribute_group');
    }
    protected static function getAttributes(){
        $data = R::getAssoc('SELECT * FROM attribute_value');
        $attrs = [];
        foreach($data as $k => $v){
            $attrs[$v['attr_group_id']][$k] = $v['value'];
        }
        return $attrs;
    }

    public static function getFilters(){
        $filter = null;
        if(!empty($_GET['filter'])){
            $filter = preg_replace("#[^\d,]+#",'',$_GET['filter']);
            $filter = rtrim($filter, ",");
        }
        return $filter;
    }

    public static function getCountGroups($filter){
        $filters = explode(',', $filter);
        $cache = Cache::instance();
        $attrs = $cache->get('filter_attributes');
        if(!$attrs){
            $attrs = self::getAttributes();
        }
        $data = [];
        foreach($attrs as $key => $item){
            foreach($item as $k => $v){
                if(in_array($k,$filters)){
                    $data[] = $key;
                    break;
                }
            }
        }
        return count($data);
    }

    protected function getHtml(){
        ob_start();
        $filter = self::getFilters();
        if(!empty($filter)){
            $filter = explode(',', $filter);
        }
        require $this->tpl;
        return ob_get_clean();
    }

}