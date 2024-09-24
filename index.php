<?php
header("Content-type: text/html; charset=utf-8");
error_reporting(-1);

require_once 'connect.php';
require_once "func.php";

if (!empty($_POST)){
    save_messages();
    header("Location: index.php");
    exit();
}

$messages = get_messages();
//echo "<pre>";
//var_dump($messages);
//echo "</pre>";

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>GuestBook</title>
</head>
<body>

<form action="" method="post">
    <input type="text" name="name">
    <br>
    <textarea name="text"></textarea>
    <br>
    <button type="submit">Send</button>
</form>
<hr>
<?php
if (!empty($messages)){
    foreach ($messages as $message):?>
        <div class="message">
            <p>Автор: <b><?=$message['name']?></b> | Дата: <i><?=$message['date']?></i></p>
            <div><?=nl2br(htmlspecialchars($message['text'])); ?></div>
        </div>
    <?php
    endforeach;
}

?>
<style>
    .message{
        padding: 10px;
        margin: 10px;
        border-radius: 5px;
        border: 1px solid gray;
    }
</style>
</body>
</html>
