<?php
error_reporting(-1);

$arr =  array('Ivanov', 'Petrov', 'Sidorov' );

//$names = [
//    'Ivan' => 'Ivanov',
//    'Petr' => 'Petrov',
//    'Sidor' => 'Sidorov'
//];
//foreach($names as $name => $surname){
//    echo "Name: $name, Surname: $surname <br>";
//}
//
//foreach($arr as $key => $value){
//    echo "Key: $key, Name: $value <br>";
//}
//
//$a = 2;
//if ( $a > 3 || $a < 7 ) {
//    echo 'OK';
//}else{
//    echo 'NO';
//}
//for ($i = 0; $i < 30; $i++) {
//    if ( $i >= 10 && $i <= 20) continue;
//    echo $i . '<br>';
//}




// HomeWork
$names = [
    'Ivan' => 'Ivanov',
    'Petr' => 'Petrov',
    'Sidor' => 'Sidorov'
];
foreach($names as $name => $surname){
    if ($name == 'Petr') continue;
    echo "Name: $name, Surname: $surname <br>";
}
echo "<hr>";
foreach($names as $name => $surname){
    echo "Name: $name, Surname: $surname <br>";
    if ($name == 'Ivan') break;
}

?>

