<?php
function debug($data){
    echo "<pre>";
    var_dump($data);
    echo "</pre>";
}
require_once 'classes/Car.php';

$car1 = new Car();
$car1->color = 'черный';
$car1->brand = 'volvo';
$car1->speed = 200;

$car2 = new Car();
$car2->color = 'белый';
$car2->brand = 'BMW';
$car2->speed = 150;

echo $car1->getCarInfo();
echo $car2->getCarInfo();


