<?php
//error_reporting(-1);
//// - оператор объединения с NULL
//$user = isset($_GET['user']) ? $_GET['user'] : '';
//// вместо верхней конструкции - можно записать нижнюю
//$user = $_GET['user'] ?? '';
//// и расширение конструкции
//$user = $_GET['user'] ?? $_GET['user2'] ?? $_GET['user3'] ?? 'guest';
//---//
// - оператор spaceship
//echo 1 <=> 2; // -1
//echo 1 <=> 1; // 0
//echo 2 <=> 1; // 1
//
//$a = 3;
//$b = 2;
//if ( ($a <=> $b) === 1){
//    echo '$a > $b';
//}elseif(($a <=> $b) === -1){
//    echo '$a > $b';
//}else{
//    echo '$a = $b';
//}
//---//
// определение массива констант
//define('DBHOST', 'localhost');
//define('DBUSER', 'root');
//define('DBPASS', 'pass');
//define('DBNAME', 'test');
// вместо верхней конструкции - можно записать нижнюю
//define('DBOPTIONS', [
//    'localhost',
//    'root',
//    'pass',
//    'test'
//]);
// или
//define('DBOPTIONS', [
//    'DBHOST'=> 'localhost',
//    'DBUSER'=> 'root',
//    'DBPASS'=> 'pass',
//    'DBNAME'=> 'test'
//]);
// но лучше использовать
//const DBOPTIONS = [
//    'DBHOST' => 'localhost',
//    'DBUSER' => 'root',
//    'DBPASS' => 'pass',
//    'DBNAME' => 'test'
//];
//---//

//use classes\controllers\Controller;
//use classes\controllers\ControllerPage;
//use classes\models\Model;
//use classes\models\ModelPage;
// можно группировать классы
//use classes\controllers\{Controller, ControllerPage};
//use classes\models\{Model, ModelPage};
//
//spl_autoload_register(function($class){
//    $file = str_replace('\\', DIRECTORY_SEPARATOR, $class) . '.php';
//    if (file_exists($file)) {
//        require_once $file;
//    }
//});
//
//
//new Controller();
//new ControllerPage();
//new Model();
//new ModelPage();
//---//
//Декларация скалярных типов
//declare(strict_types=1);
//function sum(int ...$ints){// многоточие определяет параметры переданные через запятую как один массив, который под капотом пройдет через foreach
//                            // и принудительное указание типа передаваемых переменных
//    return array_sum($ints);
//}
//echo sum(2,3.5,5); // но при этом float приравняется к int и ф-ция выдаст результат
//
//ОДНАКО! если указать конструкцию declare(strict_types=1) - вывалится Fatal error
//---//
//Декларация возвращаемых значений
// аналогичная ситуация, как в предыдущем пример, только на указание типа возвращаемого результата
//function sum($a,$b): int{
//    return $a + $b;
//}
//var_dump(sum(2.4,3)); // 5
//---//



