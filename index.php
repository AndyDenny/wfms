<?php
error_reporting(-1);

 ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<p>Lorem ipsum dolor sit amet.</p>
<?php

include 'inc.php';          //  Если путь ошибочен, то прилетит Варнинг и код отработрает дальше
include_once 'inc.php';     //  Подключается только один раз
require 'inc.php';          //  Если путь ошибочен, то прилетит ФаталЭррор и код НЕ отработрает дальше.
require_once 'inc.php';     //  Повторное подключение игнорируется

?>
<p>Lorem ipsum dolor sit amet.</p>
</body>
</html>


