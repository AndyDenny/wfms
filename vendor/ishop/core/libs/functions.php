<?php

function debug($data)
{
    echo '<pre>';
    print_r($data);
    echo  '</pre>';
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