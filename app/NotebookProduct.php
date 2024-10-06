<?php
namespace app;

use wfm\Product;
use wfm\interfaces\IGadget;
use wfm\traits\TColor;
class NotebookProduct extends Product implements IGadget{


    use TColor;
    /*
    Трейты - по сути, те же классы.
    Если наследование обьектами, раширяет структур проекта вертикально,
    то использование трейтов - горизонтально.
    Все что написано в трейте - подключатся в класс, как-будто файл через инклюд.  
    */ 
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