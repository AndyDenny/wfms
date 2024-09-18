<?php
session_start();

if (isset($_GET['do']) && $_GET['do'] == 'exit') unset($_SESSION['admin']);

if (!isset($_SESSION['admin'])) die('Need authorization');

echo 'Welcome ' . $_SESSION['admin'];

?>
<a href="secret.php?do=exit">Logout</a>
<ul>
    <li><a href="index.php">back</a></li>
</ul>
