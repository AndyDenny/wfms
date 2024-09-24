<?php

function clear_data()
{
    global $db;
    foreach ($_POST as $key => $value) {
        $_POST[$key] =  $value;
//        $_POST[$key] = mysqli_escape_string($db, $value);
    }
}

function save_messages(){
    global $db;
    clear_data();
    extract($_POST); // получаются $name и $text
//    $name = mysqli_real_escape_string($db, $_POST['name']); эту логику вынесли в ф-цию clear_data()
//    $text = mysqli_real_escape_string($db, $_POST['message']);
    $query = "INSERT INTO wfms (name, text ) VALUES ( '$name' , '$text' )";
    mysqli_query($db, $query);
}

function get_messages()
{
    global $db;
    $query = "SELECT * FROM wfms ORDER BY id DESC";
    $res = mysqli_query($db, $query);
    return mysqli_fetch_all($res, MYSQLI_ASSOC);
}