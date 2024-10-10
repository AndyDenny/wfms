<?php

namespace ishop;

class Db
{
    use TSilngleton;

    protected function __construct()
    {
        $db = require_once  CONF . '/config_db.php';
    }

}