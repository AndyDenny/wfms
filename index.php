<?php
function debug($data){
    echo "<pre>";
    var_dump($data);
    echo "</pre>";
}
require_once 'classes/File.php';

$file = new File(__DIR__ . '/text.txt');
$file->write('String 1');
$file->write('String 2');
$file->write('String 3');
$file->write('String 4');
$file->write('String 5');


