<?php
use app\classes\Cart;

session_start();

require '../vendor/autoload.php';
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

$cart = new Cart();
$cart->add_product($id);

$cart->dump();

header('Location: /');