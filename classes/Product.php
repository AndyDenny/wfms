<?
class Product{

    private $name;
    protected $price;
 
    private $discount = 0;

    public function __construct($name, $price){
        $this->name = $name;
        $this->price = $price; 
    }

    public function getDiscount(){
        return $this->discount;
    }

    public function setDiscount($discount){
        $this->discount = $discount;
    }
    // Осуществляется доступ для изменения св-ва, доступного только изнутри класса

    public function getName(){
        return $this->name;
    }

    public function getPrice(){
        return $this->price - ($this->discount / 100 * $this->price);
    }
    public function getProduct(){
        return "<hr><b>О товаре:</b><br/>
            Наименование: {$this->name}<br/>
            Цена: {$this->price}<br/>
            Цена со скидкой: {$this->getPrice()}<br/>";
    }

}