<?php
error_reporting(-1);


//copy('test.txt', 'folder/test.txt'); // скопировать файл по указанному пути - папки должны уже существовать
//if (file_exists('folder/test.txt')) echo 'File already exists.';

//$file = file_get_contents('test.txt'); // читаем файл в переменную
//$file2 = file_get_contents('https://php.net/'); // читаем документ в переменную
//$file3 = file_get_contents('test.txt');
//echo nl2br($file3); // нормальнй многострочный вывод

//$file = file_get_contents('https://php.net/');
//file_put_contents('test.txt', $file, FILE_APPEND); // записываем или дописываем иформацию в файл
//$ext_file = file('test.txt',FILE_SKIP_EMPTY_LINES | FILE_IGNORE_NEW_LINES);
//echo "<pre>";
//print_r($ext_file);
//echo "</pre>";

//echo is_dir('folder') ? 'is directory' : 'is not directory'; // is directory
//echo is_dir('./') ? 'is directory' : 'is not directory'; // is directory
//echo is_dir('../') ? 'is directory' : 'is not directory'; // is directory
//echo is_dir('test.txt') ? 'is directory' : 'is not directory'; // is not directory
//echo is_file('test.txt') ? ' is file' : ' is not file'; // is file
//echo is_file('folder') ? ' is file' : ' is not file'; // is not file

//rename('test.txt','folder/test2.txt'); // переименовывает\перемещает файл или папку
//mkdir('new_folder'); // создает директорию
//mkdir('1/2/3', 0777, true); // создает вложенные директории
//rmdir('new_folder'); // удаляет директорию
//touch('test.txt', time() - 3600); // модификация времени создания файла
//unlink('test.txt'); // удаляет файл
//HOMEWORK
/*
Ivan
message text
12.12.2005
----------
*/
if (isset($_POST['send']) == 'Send'){
    $name = $_POST['name'];
    $message = $_POST['message'];
    $date = date("d.m.Y");

    $string = $name . "\n" . $message . "\n" . $date . "\n------\n";

    file_put_contents('guestbook.txt', $string, FILE_APPEND);
    header('Location: index.php');

}
if ( file_exists('guestbook.txt') ) echo nl2br(file_get_contents('guestbook.txt'));

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
<form action="" method="post">
    <input type="text" name="name">
    <textarea name="message"></textarea>
    <button name="send">Send</button>
</form>
</body>
</html>
