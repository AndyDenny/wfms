<?php

namespace ishop;

class Router
{
 protected static  $routes = [];
 protected static  $route = [];

 public static function add($regexp, $route = []){
     self::$routes[$regexp] = $route;
 }

    /**
     * @return array
     */
    public static function getRoutes()
    {
        return self::$routes;
    }

    /**
     * @return array
     */
    public static function getRoute()
    {
        return self::$route;
    }

    public static function dispatch($url)
    {
        if (self::matchRoute($url)){
            echo 'OK';
        }else{
            echo 'NO';
        }
    }

    public static function matchRoute($url)
    {

    }

}