<?php

function debug($data){
    echo "<pre>";
    var_dump($data);
    echo "</pre>";
}

require_once 'classes/Product.php';
// require_once 'classes/NotebookProduct.php';
require_once 'classes/BookProduct.php';

$book = new BookProduct('Три мушкетера', 120, 378);
// $notebook = new NotebookProduct('Asus',4598, 'Intel');

debug($book);
// debug($notebook);
 
echo $book->getProduct();
// echo $notebook->getProduct();

