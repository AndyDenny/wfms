<?php
error_reporting(-1);

 // $this = '123';// так нельзя именовать свою переменную


// типы данных
 /*
boolean - True | FALSE
integer - 123
float - 1.2
string - 'this is string'
(HEREDOC) - аналог двойных кавычек
(NOWDOC) - аналог одинарных кавычек
*/

// $bool = true; // выведет - 1
// $bool2 = false; 
// echo $bool2;  // выведет пустую строку
// var_dump($bool2);

// $int = 123;
// var_dump($int);

// $float = 1.2;
// var_dump($float);

// $var = 10;
// $string = 'this is string $var'; // this is string $var
// $string2 = "this is string $var"; // this is string 10
// $string3 = "this is string {$var}s"; // this is string 10s
// $string4 = 'this is \'string \' '. $var; // this is 'string' 10
// $string5 = "this is \"string\" ". $var ; // this is "string" 10


// (HEREDOC)
//после HERE должен быть сразу перевод строки
$str = <<<HERE
This is "string" $var
HERE; // тут обязательно должно быть что-то после, например, закрывающий символ рнр или какой-то код

// (NOWDOC)
// отличие от HEREDOC в том что ключеове слово берется в одинарные кавычки
$str = <<<'HERE'
This is "string" $var
HERE;

?>