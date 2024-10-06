<?php

use \wfm\interfaces\IGadget;
use \app\{BookProduct, NotebookProduct};


function debug($data){  
    echo "<pre>";
    var_dump($data);
    echo "</pre>";
}

/*
Заменяем кучу инклюдов на ф-цию spl_autoload_register()
*/ 

// function autoloader($className){
//     $className = str_replace('\\','/',$className); // подменяем слэш, для linux систем
//     $file = __DIR__ . "/{$className}.php"; // путь берется из namespace указанного в файле
//     if(file_exists($file)){
//         require_once $file;
//     }
// }
// spl_autoload_register('autoloader'); 

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
// // debug($notebook);

// offerCase($notebook);
class A{
    const TEST = 'class A';
    public function getTest(){
        var_dump(self::TEST);
    }
    public function getTest2(){
        var_dump(static::TEST);
    }
}
class B extends A{
    const TEST = 'class B';
}

$a = new A();
$b = new B();
$a->getTest(); // class A
$b->getTest(); // class A
$b->getTest2(); // class B
/*
Ключевое слово "self" позволяет получить константу класса.
Константа наследуется и выводит значение заданное в родительском классе.
Если, первый метод getTest, перегрузить в дочернем классе - выведется дочерняя константа.
Однако,при этом происходит дублирование кода.
За счет механизма позднего статического связывания,
во втором методе getTest2, ключевое слово "static", 
позволяет переопределить константу, в дочерненм классе.
*/ 

/*
Цепочки методов
$book->getAtion1()->getAction2()->getAction3()->...

Чтобы реализовать такой механизм - методы обьекта должны возвращать сам объект.

public finction getAtion1(){
    echo 'First action - done.';
    return $this; // это позволит использовать следующий метод, цепочкой действий. 
}

*/ 



