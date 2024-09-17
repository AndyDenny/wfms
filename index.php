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

<form action="action.php">
    <p>
        <input type="text" name="name">
    </p>
    <p>
        <textarea name="text" id="" cols="30" rows="10"></textarea>
    </p>
    <p>
        <select name="lang[]" id="" multiple>
            <option value="rus">Russian</option>
            <option value="eng">English</option>
            <option value="ger">Germany</option>
        </select>
    </p>
    <p>
        <input type="checkbox" name="remember">
    </p>
    <p>
        <button type="submit" name="send" value="test">Send</button>
    </p>
</form>
<hr>
<p>Введенное имя: <?php if(!empty($_POST['name'])) echo $_POST['name']; else echo 'форма не отправлена' ?></p>
<p>Введенный текст: <?php echo !empty($_POST['text']) ? nl2br($_POST['text']) : 'форма не отправлена' ?></p>
 
</body>
</html>

