<?php

namespace ishop;

class App
{

    public static $app;

    public function __construct()
    {
        $query = trim($_SERVER['REQUEST_URI'], '/');
        session_start();
        self::$app = Registry::instance();
        $this->getParams();
        new ErrorHandler();
        Router::dispatch($query);
    }



    protected function getParams()
    {
        $params = require_once CONF . '/params.php';
        if(!empty($params)){
            foreach($params as $key => $value){
                self::$app->setProperty($key,$value);
            }
        }
    }

}