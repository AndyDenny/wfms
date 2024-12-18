<?php

namespace ishop;

use RedBeanPHP\R;

class Db
{
    use TSilngleton;

    protected function __construct()
    {
        $db = require_once  CONF . '/config_db.php';
        class_alias('\RedBeanPHP\R','\R');
        R::setup($db['dsn'],$db['user'],$db['password']);
        if(!R::testConnection()){
            throw new \Exception('DataBase is not connection...',500);
        }
        R::freeze(true);
        if(DEBUG){
            R::debug('true', 1);
        }
    }

}