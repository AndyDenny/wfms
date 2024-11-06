<?php


namespace app\widgets\menu;


use ishop\App;
use ishop\Cache;
use RedBeanPHP\R;

class Menu{

    protected $data;
    protected $three;
    protected $menuHtml;
    protected $tpl;
    protected $container = 'ul';
    protected $class = 'menu';
    protected $table = 'category';
    protected $cache = 3600;
    protected $cacheKey = 'ishop_menu';
    protected $attrs = [];
    protected $prepend = '';

    public function __construct($options = [] ){
        $this->tpl = __DIR__ . '/menu_tpl/menu.php';
        $this->getOptions($options);
        $this->run();
    }

    protected function getOptions($options){
        foreach ($options as $k => $v){
            if(property_exists($this,$k)){
                $this->$k = $v;
            }
        }
    }

    protected function run(){
        $cache = Cache::instance();
        $this->menuHtml = $cache->get($this->cacheKey);
        if(!$this->menuHtml){
            $this->data = App::$app->getProperty('categories');
            if(!$this->data){
                $this->data = R::getAssoc("SELECT * FROM {$this->table}");
            }
            $this->three = $this->getThree();
            $this->menuHtml = $this->getMenuHtml($this->three);
            if($this->cache){
                $cache->set($this->cacheKey, $this->menuHtml, $this->cache);
            }
        }
        $this->output();
    }

    protected function output(){
        $attrs = '';
        if(!empty($this->attrs)){
            foreach($this->attrs as $key => $value){
                $attrs .= " $key='$value' ";
            }
        }
        echo "<{$this->container} class='{$this->class}' $attrs>";
            echo $this->prepend;
            echo $this->menuHtml;
        echo "</{$this->container}>";
    }

    protected function getThree(){
        $tree = [];
        $data = $this->data;
        foreach ($data as $id => &$node){
            if (!$node['parent_id']){
                $tree[$id] = &$node;
            }else{
                $data[$node['parent_id']]['childs'][$id] = &$node;
            }
        }
        return $tree;
    }
    protected function getMenuHtml($three,$tab = ''){
        $str = '';
        foreach ($three as $id => $category) {
            $str .= $this->categoryToTemplate($category, $tab, $id);
        }
        return $str;
    }
    protected function categoryToTemplate($category,$tab, $id){
        ob_start();
        require $this->tpl;
        return ob_get_clean();
    }

}