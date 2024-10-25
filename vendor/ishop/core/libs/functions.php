<?php

function debug($data, $die = 0)
{
    echo '<pre>';
    var_dump($data);
    echo  '</pre>';
    $die ? die() : '' ;
}

function redirect($http = false){
    if($http){
        $redirect = $http;
    }else{
        $redirect = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : PATH;
    }
    header("Location: $redirect");
    exit();
}

function hsc($string){
    return htmlspecialchars($string,ENT_QUOTES);
}