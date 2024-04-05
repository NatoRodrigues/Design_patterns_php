<?php
use app\classes\Cart;

session_start();

require '../vendor/autoload.php';

if (isset($_SESSION['cart'])) {
    $cart = new Cart;
    $cart->clear();
}
header("Location: {$_SERVER['HTTP_REFERER']}");
session_destroy();
exit();