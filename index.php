<?php
session_start();


if (!empty($_POST['login'])){
    if ($_POST['login'] == 'admin'){
        $_SESSION['admin'] = 'admin';
        $_SESSION['message'] = 'Authorised as Admin';
        header('Location: index.php');
        die();
    }
}
//$_SESSION['name'] = 'Andy';

//echo $_SESSION['name'];

//unset($_SESSION['name']); // удаление переменной
//session_unset(); // удаление переменных
//session_destroy(); // удаление файла сессии

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
<a href="secret.php">secret</a>
<!---->
<?php
if (isset($_SESSION['message'])){
    echo $_SESSION['message'];
    unset($_SESSION['message']);
}
?>
<!---->
<form  method="post" action="" enctype="multipart/form-data">
    <p>
        <input type="text" name="login">
    </p>
    <p>
        <button type="submit" name="send" value="test">Login</button>
    </p>
</form>
<hr>

</body>
</html>

