<?php
error_reporting(-1);

$title = 'hello world';
$title = 'page title';
$fruit = 'apple';
$винни_пух = "Hello I'm Winnie."; // оказывается так тоже можно
$winnie_pooh = "Hello I'm Winnie. I have 2 {$fruit}s";


//регистрозависимость
$var = '123';
$Var = '456';

// определение констант

define('PAGE','new page'); // такой способ используется только в начале кода
const PAGE2 = 'new const'; // не работает ниже версии 5.3

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Урок 2</title>
</head>
<body>
    <!-- константы в кавычках не обрабатываются -->
    <h1><?php echo PAGE; ?></h1>
    <p><?php echo $winnie_pooh; ?></p>
    <p><?php echo $Var; ?></p> 
    <p><?php echo PAGE2; ?></p> 
</body>
</html>