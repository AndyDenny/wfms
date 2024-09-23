<?php
error_reporting(-1);

$name_server = 'localhost';
$name_db = 'gb';
$name_user = 'root';
$password = '';


// @ - предваряя вызов функции этим знаком - подавляются ошибки, возвращаемые функией
$db = @mysqli_connect($name_server,$name_user, $password, $name_db);
// echo mysqli_connect_error(); // возвращает строку с последней ошибкой, случившейся при подключении к БД
if(!$db) die(mysqli_connect_error()); // при ошибке подключения к базе - выкидываем ошибку и останавливаем дальнейшее исполнение
// аналогичная ситуация, только текст ошибки пишется свой
// $db = @mysqli_connect($name_server,'root123', $password, $name_db) or die('ошибка соединения с БД');
// mysqli_set_charset($db, 'utf8') or die('Не корректная кодировка'); // UTF8 - пишется без тире, так же как и в списке кодировок БД

// $insert = "INSERT INTO `guestbook` (`name`, `text`) VALUES ('Maxim','Lorem ipsum dolor sit amet.')"; // запрос к базе пишем в отдельную переменную
// $res_insert =  mysqli_query($db,$insert); // и отправляем запрос в базу, к которой подключились ранее
// $err = mysqli_error($db); // ф-ция для показа ошибки, при запросе в БД
// echo $err;  

// $update = "UPDATE guestbook SET text = CONCAT(text,'|||') WHERE id > 4";
// $res_update = mysqli_query($db,$update) or die(mysqli_error($db)); // и можно комбинировать ф-ции в одну строку

// $delete = "DELETE FROM guestbook WHERE id = 6";
// mysqli_query($db,$delete) or die(mysqli_error($db));
// echo mysqli_affected_rows($db); // возвращает кол-во измененных строк( или 0 ) | или (-1) ошибку 

$res = mysqli_query($db, "SELECT * FROM guestbook");
var_dump($res);
