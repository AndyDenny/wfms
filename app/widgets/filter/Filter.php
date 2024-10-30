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
            $this->attributes =  $this->getAttributes();
            $cache->set('filter_attributes',$this->attributes,1);
        }
        $filters = $this->getHtml();
        echo $filters;
    }

    protected function getGroups(){
        return R::getAssoc('SELECT id, title FROM attribute_group');
    }
    protected function getAttributes(){
        $data = R::getAssoc('SELECT * FROM attribute_value');
        $attrs = [];
        foreach($data as $k => $v){
            $attrs[$v['attr_group_id']][$k] = $v['value'];
        }
        return $attrs;
    }
    protected function getHtml(){
        ob_start();
        require $this->tpl;
        return ob_get_clean();
    }

}