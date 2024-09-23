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

// $res = mysqli_query($db, "SELECT * FROM guestbook"); // возвращается объект БД
// $res = mysqli_query($db, "SELECT name FROM guestbook"); // выбираем конкретные поля
// $res = mysqli_query($db, "SELECT id, name, text, date FROM guestbook ORDER BY id DESC"); // выбираем конкретные поля с определенной сортировкой
// $data = mysqli_fetch_all($res , MYSQLI_ASSOC); // возвращает нумерованный (или именованный) массив данных БД
// foreach ($data as $item){
//     echo "Name: {$item['name']} <br>";
//     echo "Text: {$item['text']} <br>";
//     echo "Date: {$item['date']} <br>";
//     echo "<hr>";
// }
// echo "<pre>";
// var_dump($res);
// echo "</pre>";

// $data2 = [];
// while($row = mysqli_fetch_assoc($res)){ // выбирается по однойстроке
//     $data2[$row['id']] = $row; 
// }
// echo "<pre>";
// var_dump($data2);
// echo "</pre>";

// echo mysqli_num_rows($res); // кол-во строк в выборке

$name_special = "d'Artanian";
$name_special = mysqli_real_escape_string($db,$name_special);
$query = "INSERT INTO `guestbook` (`name`, `text`) VALUES ('$name_special','string with apostroph.')";
mysqli_query($db,$query) or die(mysqli_error($db));