<?php
$name_server = 'localhost';
$name_db = 'develop';
$name_user = 'develop';
$password = 'develop';
// jdbc:mariadb://localhost:33061/develop
$db = @mysqli_connect($name_server,$name_user, $password, $name_db) or die("Error connecting to DB");
//mysqli_set_charset($db,"utf8") or die("Wrong charset"); // перекодровка, в данном случае не требуется
