<?php
class BookProduct extends Product implements I3D{

// extends - указывает родительский класс
// implements - указывает на интерфейс 

    public $numPages;

    // public $public = 'Public';
    // //доступ к св-ву\методу есть из любого места
    // protected $protected = 'Protected';
    // // доступ изнутри класса и его наследников
    // private $private = 'Private';
    // // доступ только изнутри класса


    // const TEST2 = 'reorder const';
    // переопределять константу интерфейса нельзя
    const TEST = 20;
    // а константу родительского класса - можно

    public function __construct($name, $price, $numPages = null){
        parent::__construct($name, $price);
        $this->numPages = $numPages;
        $this->setDiscount(50);
        // изменение защищенного св-ва, родительского класса,
        // за счет его публичного метода.
    }

    public function test(){ // метод из интерфейса
        // метод обьявленныый в интерфейсе, должен быть реализован 
        // в классе, который, его в себя включает.
        var_dump(self::TEST2);
        
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

    public function addProduct($name, $price, $numPages = 0){
        var_dump($name);
        var_dump($price);
        var_dump($numPages);
    }
    // при наследовании абстрактного метода, учитывается что
    // модификатор доступа должен, быть такой же или "ниже"
    // при родительском protected - дочерний protected или public

    // если требуются дополнительные параметры, в дочернем методе
    // они должны указываться со значением по-умолчанию




}