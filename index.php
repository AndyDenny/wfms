<?php
error_reporting(-1);


//$var = false;
//(bool) - ф-ция явного приведения типа
//var_dump((bool) 0); // false
//var_dump((bool) ''); // false

//$light = 'red';
//
//if ($light == 'green'){
//    echo "we may go";
//}

//var_dump(5 > 3); // true
//var_dump(5 < 3); // false
//>=
//<=
//!=
//if (5 > 3)
//    echo 'OK'; // инструкция в кол-ве одной строки может записываться без фигурных скобок

$light = 'yellow';
if ($light == 'green'){
    if (5 > 3){
        echo "5 > 3";
    }
    echo "we may go";
} elseif ($light = 'yellow'){
    echo "we may ready";
}else{
    echo "we must stop";
}


?>
