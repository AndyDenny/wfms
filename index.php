<?php
function debug($data){
    echo "<pre>";
    var_dump($data);
    echo "</pre>";
}
require_once 'classes/Car.php';

$car1 = new Car('черный',4,200,'volvo');
$car2 = new Car('белый',4,210,'BMW');

echo $car1->getCarInfo();
echo $car2->getCarInfo();


