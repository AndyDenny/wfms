<?php
function debug($data){
    echo "<pre>";
    var_dump($data);
    echo "</pre>";
}
require_once 'classes/Car.php';

$car = new Car(); // создаем экземпляр класса - объект.
//new - оператор создания обьекта
debug($car);
$car1 = new Car();
$car1->color = 'черный'; // переопределяем св-ва объекта
$car1->brand = 'volvo';
$car1->speed = 200;
$car1->year = 2000; // добавляем св-во на лету - так делать не рекомендуется
$car1->coloг = 'синий'; // чтобы избежать ошибок, получения нужных данных
// ->  - оператор обращения к св-вам или методам объекта
debug($car1);
$car2 = new Car();
$car2->color = 'белый';
$car2->brand = 'BMW';
$car2->speed = 150;
debug($car2);

echo "<h3>О моем авто:</h3>
Марка: {$car1->brand}<br>
Цвет: {$car1->coloг}<br>
Кол-во колес: {$car1->wheel}<br>
Год выпуска: {$car1->year}<br>
Скорость: {$car1->speed}<br>


";

