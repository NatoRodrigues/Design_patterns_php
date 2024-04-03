<?php 
use app\classes\Cart;
require '../vendor/autoload.php';

$products = require './products.php';
var_dump($products);

$cart_products = (new Cart) -> cart();
$cart->dump();
?>