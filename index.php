<?php
error_reporting(-1);


    echo "<pre>";
    var_dump($_SERVER);
    echo "</pre>";

if(!empty($_POST)){
    echo "<pre>";
    var_dump($_POST);
    echo "</pre>";
}
if(!empty($_GET)){
    echo "<pre>";
    var_dump($_GET);
    echo "</pre>";
}
if(!empty($_FILES)){
    echo "<pre>";
    var_dump($_FILES);
    echo "</pre>";
    move_uploaded_file($_FILES["file"]["tmp_name"], 'upl/' . $_FILES["file"]["name"]);
}


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

<form  method="post" action="" enctype="multipart/form-data">
    <p>
        <input type="text" name="name">
    </p>
    <p>
        <textarea name="text"></textarea>
    </p>
    <p>
        <input type="file" name="file">
    </p>
    <p>
        <button type="submit" name="send" value="test">Send</button>
    </p>
</form>
<hr>

</body>
</html>

