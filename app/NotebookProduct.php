<?php
namespace app;

use wfm\Product;
use wfm\interfaces\IGadget;
class NotebookProduct extends Product implements IGadget{

    public $cpu;

    public function __construct($name, $price, $cpu = null){
        parent::__construct($name, $price);
        $this->cpu = $cpu;
    }

    public function getCpu(){
        return $this->cpu;
    }

    public function getProduct(){
        $out = parent::getProduct();
        $out.= "Процессор: {$this->getCpu()}<br>";
        return $out;
    }
    
    public function addProduct($name, $price, $numPages = 0){
        var_dump($name);
        var_dump($price);
        var_dump($numPages);
    }
    public function getCase(){
        
    }
}