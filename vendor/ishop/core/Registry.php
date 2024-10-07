<?php

namespace ishop;

class Registry
{
    use TSilngleton;

    public static $properties = [];

    /**
     * @param array $properties
     */
    public function setProperty($name, $value)
    {
        self::$properties[$name] = $value;
    }

    /**
     * @return array
     */
    public function getProperties($name)
    {
        if(isset(self::$properties[$name])){
            return self::$properties[$name];
        }
        return null;
    }

    public function getPropertiers()
    {
        return self::$properties;
    }
}