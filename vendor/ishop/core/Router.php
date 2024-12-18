<?php

namespace ishop;

use http\Exception;

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
        $url = self::removeQueryString($url);
        if (self::matchRoute($url)){
            $controller = 'app\controllers\\' . self::$route['prefix'] . self::$route['controller'] . 'Controller';
             if (class_exists($controller)){
                 $controllerObject = new $controller(self::$route);
                 $action = self::lowerCamelCase(self::$route['action']) . 'Action';
                if(method_exists($controllerObject,$action)){
                    $controllerObject->$action();
                    $controllerObject->getView();
                }else{
                    throw new \Exception("Method $controller::$action - not found", 404);
                }
             }else{
                 throw new \Exception("Controller {$controller} - not found", 404);
             }
        }else{
           throw new \Exception('Page NOT found', 404);
        }
    }

    public static function matchRoute($url)
    {

        foreach(self::$routes as $pattern => $route){
            if( preg_match("#{$pattern}#", $url,$matches) ){
                foreach($matches as $key => $value){
                    if(is_string($key)){
                        $route[$key] = $value;
                    }
                }
                if(empty($route['action'])){
                    $route['action'] = 'index';
                }
                if(!isset($route['prefix'])){
                    $route['prefix'] = '';
                }else{
                    $route['prefix'] .= '\\';
                }
                $route['controller'] = self::upperCamelCase($route['controller']);
                self::$route = $route;
                return true;
            }
        }
        return false;
    }
    /**
     * @return string
     * in format CamelCase
     */
    public static function upperCamelCase($string){
//        page-new
        $string = str_replace('-',' ', $string);
//        page new
        $string = ucwords($string);
//        Page New
        $string = str_replace(' ','', $string);
//        PageNew
        return $string;
    }

    /**
     * @return string
     * in format camelCase
     */

    public static function lowerCamelCase($string){
        return lcfirst(self::upperCamelCase($string));
    }

    public static function removeQueryString($url)
    {
        $params = explode('&',$url,2);
        if($url){
            if(false === strpos($params[0], '=') ){
                return $params[0];
            }
        }
        return '';
    }
}