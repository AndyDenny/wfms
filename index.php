<?php
function debug($data){
    echo "<pre>";
    var_dump($data);
    echo "</pre>";
}
require_once 'classes/Car.php';
echo Car::getCount();
echo '<br>';
$car1 = new Car('черный',4,200,'volvo');
echo Car::getCount();
echo '<br>';
$car2 = new Car('белый',4,210,'BMW');
echo Car::getCount();
echo '<br>';

echo $car1->getCarInfo();
 echo $car1->getPrototypeCarInfo();
 echo Car::TEST_CAR_SPEED;
echo $car2->getCarInfo();
 


