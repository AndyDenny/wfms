<?php

namespace ishop;

class Cache{

    use TSilngleton;

    public function set($key, $data, $seconds = 3600){
        if($seconds){
            $content['data'] = $data;
            $content['endtime'] = time() + $seconds;
            if(file_put_contents(CACHE . '/'. md5($key) . '.txt', serialize($content))){
                return true;
            }
        }
        return false;
    }

    public function get($key){
        $file = CACHE . '/' . md5($key) . '.txt';
        if(file_exists($file)){
            $content = unserialize(file_get_contents($file));
            if(time() <= $content['endtime']){
                return $content['data'];
            }
            unlink($file);
        }
        return false;
    }

    public function delete($key){
        $file = CACHE . '/' . md5($key) . '.txt';
        if(file_exists($file)){
            unlink($file);
        }
    }

}