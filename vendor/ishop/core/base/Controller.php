<?php

namespace ishop\base;

abstract class Controller
{
        public $route;
        public $controller;
        public $model;
        public $view;
        public $prefix;
        public $layout;
        public $data = [];
        public $meta = ['title' => '', 'description' => '', 'keywords' => ''];

        public function __construct($route)
        {
            $this->route = $route;
            $this->controller = $route['controller'];
            $this->model = $route['controller'];
            $this->view = $route['action'];
            $this->prefix = $route['prefix'];
        }

    /**
     * @return array
     */
    public function getView()
    {
        $viewObject = new View($this->route, $this->layout, $this->view, $this->meta);
        $viewObject->render($this->data);
    }

    /**
     * @param array $data
     */
    public function set($data)
    {
        $this->data = $data;
    }

    /**
     * @param array $meta
     */
    public function setMeta($title = '', $description = '', $keywords = '')
    {
        $this->meta['title'] = $title;
        $this->meta['description'] = $description;
        $this->meta['keywords'] = $keywords;
    }

    public function isAjax(){
        return isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest';
    }

    public function loadView($view, $vars = []){
        extract($vars);
        require  APP . "/views/{$this->prefix}{$this->controller}/{$view}.php";
        die();
    }

}