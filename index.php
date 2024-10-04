<?php

function debug($data){
    echo "<pre>";
    var_dump($data);
    echo "</pre>";
}

require_once 'classes/Product.php';
require_once 'classes/I3D.php';
require_once 'classes/IGadget.php';
require_once 'classes/NotebookProduct.php';
require_once 'classes/BookProduct.php';

function offerCase(iGadget $product){ // Предваряя передачу объекта -
    // указывается его тип(в данном случае принадлежность к интерфейсу),
    // для получения нужного типа объекта
    echo "Предлагаем чехол для устройства {$product->getName()}<br/>";
    // вызывается метод класса переданного объекта
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

debug($book);
// debug($notebook);

offerCase($notebook);

// class A{};
// class B extends A{};
// class C{};

// $a = new A();
// $b = new B();
// $c = new C();

// // instanceof - оператор проверки типа обьекта.
// // Принадлежит объект тому или иному классу/интерфейсу. Возвращает true\false

// var_dump($a instanceof A); // true
// var_dump($b instanceof B); // true
// var_dump($c instanceof C); // true
// // тут все объекты своих классов
// var_dump($c instanceof A); // false
// // потому что "$с" не объект класса "А"
// var_dump($b instanceof A); // true
// // потому что "$b" объект класса "B",
// // родителем которого является класс "А"



