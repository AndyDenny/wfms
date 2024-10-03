<?php
class BookProduct extends Product{

    public $numPages;

    // public $public = 'Public';
    // //доступ к св-ву\методу есть из любого места
    // protected $protected = 'Protected';
    // // доступ изнутри класса и его наследников
    // private $private = 'Private';
    // // доступ только изнутри класса

    public function __construct($name, $price, $numPages = null){
        parent::__construct($name, $price);
        $this->numPages = $numPages;
        $this->setDiscount(50);
        // изменение защищенного св-ва, родительского класса,
        // за счет его публичного метода.

    }

    public function getnumPages(){
        return $this->numPages;
    }

    public function getProduct(){
        $out = parent::getProduct();
        $out.= "Цена без скидки: {$this->price}<br>";
        $out.= "Кол-во страниц: {$this->getnumPages()}<br>";
        $out.= "Cкидка: {$this->getDiscount()}<br>";
        return $out;
    }
}