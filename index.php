<?php

use \wfm\interfaces\IGadget;
use \app\{BookProduct, NotebookProduct,A,B};
 

function debug($data){  
    echo "<pre>";
    var_dump($data);
    echo "</pre>";
}

/*
Заменяем автоматическим механизмом композера
*/ 

require_once __DIR__ . '/vendor/autoload.php';


function offerCase(iGadget $product){ // Предваряя передачу объекта -
    // указывается его тип(в данном случае принадлежность к интерфейсу),
    // для получения нужного типа объекта
    echo "Предлагаем чехол для устройства {$product->getName()}<br/>";
    // вызывается метод класса переданного объекта,
    // поскольку, использоется наследование, в данном случае - от его родителя.
}

/*
все-равно не понятно,зачем передавать интерфейс, если можно передать тип объекта?
если есть, разные типы объектов, но схожие реализации.
например - ноутбук, телефон, компьютер. Объекты разные, их много - имплементим один интерфейс
и передаем его рядом, в параметр. Получается, внутрь реализации, придут только те объекты,
которые принадлежат одному типу - электронные ус-ва, при этом книги не придут. При этом мы получаем,
расширенную проверку типов "из коробки".
*/

$book = new BookProduct('Три мушкетера', 120, 378);
$notebook = new NotebookProduct('Asus',4598, 'Intel');

// debug($book);
// offerCase($notebook);
 
$a1 = A::getInstance();
$a2 = A::getInstance();
var_dump($a1); // object(App\A)#5 (0) { }
var_dump($a2); // object(App\A)#5 (0) { }
// В классе А, с помощью трейта(для переиспользования в классе В),
// реализован паттерн синглтон. Первая переменная - создает инстанс класса,
// вторая - уже его возвращает.
$b1 = B::getInstance();
$b2 = B::getInstance();
var_dump($b1); // object(App\B)#6 (0) { }
var_dump($b2); // object(App\B)#6 (0) { }