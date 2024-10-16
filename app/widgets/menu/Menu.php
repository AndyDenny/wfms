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
                $this->data = R::getAssoc('SELECT * FROM {$this->table}');
            }

        }
        $this->output();
    }

    protected function output(){
        $this->menuHtml;
    }

    protected function getThree(){

    }
    protected function getMenuHtml($three,$tab = ''){

    }
    protected function categoryToTemplate($category,$tab, $id){

    }

}