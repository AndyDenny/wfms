<?php
error_reporting(-1);
//
//$arr =  array('Ivanov', 'Petrov', 'Sidorov' );
//
//$arr[] = 'Pupkin';
//$arr[] = 'Doe';
//print_r($arr);

//$i = 1;
//while ($i <= 10) {
//    echo $i;
//    $i++;
//}
//
//for ($i = 0; $i < count($arr); $i++) {
//    echo $arr[$i] . "<br>";
//}



// HomeWork
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
<?php

echo '<table border="1">';
for ($i = 1; $i < 10; $i++) {
    echo '<tr>';
    for ($j = 1; $j < 10; $j++) {
        echo "<td>{$i} x {$j} = " . $i*$j . "</td>";
    }
    echo '</tr>';
}
echo '</table>';
echo '<br>';
echo '<select>';
for ($i = 1900; $i <= 2024; $i++) {
    echo "<option>$i</option>";
}
echo '</select>';
?>

</body>
</html>

