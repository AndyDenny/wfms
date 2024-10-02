<?php
class BookProduct extends Product{

    public $numPages;

    public function __construct($name, $price, $numPages = null){
        parent::__construct($name, $price);
        $this->numPages = $numPages;   

    }

    public function getnumPages(){
        return $this->numPages;
    }

    public function getProduct(){
        $out = parent::getProduct();
        $out.= "Кол-во страниц: {$this->getnumPages()}<br>";
        return $out;
    }
}