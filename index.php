<?php
error_reporting(-1);
//
//$nums = [1,2,3];
//$names = ['Ivanov', 'Petrov', 'Sidorov'];
//
//function sum($a, $b){
//    echo $a + $b;
//    echo '<br>';
//}
//
//function sum2($a = 1, $b = 2){
//    echo $a + $b;
//    echo '<br>';
//}
//
//
//$x = 100;
//$y = 10;
//
//sum(5, 7);   // 12
//sum(10, 5);  // 15
//sum(5, 10);  // 15
//sum($x, $y);        // 110
////sum();   //  такой вызов совершать нельзя, потому что выпадет ошибка, поскольку ф-ция вызываетсяс обязательной передачей параметров
//sum2(); // такой вызов возможен, поскольку у ф-ции есть параметры по-умолчанию
//
//$a = 5;
//function sum3(&$a, $b = 2){ // Передача параметра по ссылке, позволяет изменить переменную переданную как параметр ф-ции
//    $a = 100;
//    echo '<br>';
//}
//sum3($a);
//echo $a; // 100
//
//function sum4($a = 1, $b = 2){
//    return $a + $b;    // Возврат результата, в место вызова ф-ции
//}
//echo 5 + sum4(); // 8
//
//function my_array_keys($array){
//    $data = [];
//    foreach ($array as $k=>$v){
//        $data[] = $k;
//    }
//    return $data;
//}
//
//$keys = array_keys($nums);
//print_r($keys); // Array ( [0] => 0 [1] => 1 [2] => 2 )
//$keys = my_array_keys($nums);
//print_r($keys); // Array ( [0] => 0 [1] => 1 [2] => 2 )
// HomeWork

function my_count($array){
    if(is_array($array)){
        $counter = 0;
        foreach ($array as $k=>$v){
            $counter++;
        }
        return $counter;
    }
}

echo my_count($nums);

