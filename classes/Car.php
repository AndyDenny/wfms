<?php
class Car{

    public $color;
    public $wheel = 4;
    public $speed = 180;
    public $brand;
    public function getCarInfo(){ // по-умолчанию метод является публичным, но всё-равно, рекомендуется указывать модификатор
//  $this - псевдопеременная, указывает на текущий экземпляр объекта, открывая возможность доступа к его св-вам и методам
        return  "<h3>О моем авто:</h3>
                Марка: {$this->brand}<br>    
                Цвет: {$this->color}<br>
                Кол-во колес: {$this->wheel}<br>
                Год выпуска: {$this->year}<br>
                Скорость: {$this->speed}<br> 
                ";
    }
}
