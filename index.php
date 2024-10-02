<?php
function debug($data){
    echo "<pre>";
    var_dump($data);
    echo "</pre>";
}

require_once 'classes/Product.php';

$book = new Product('Три мушкетера', 120, null, 378);
$notebook = new Product('Asus',4598, 'Intel');

// debug($book);
// debug($notebook);
 
echo $book->getProduct('book');
echo $notebook->getProduct();

