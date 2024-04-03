<?php
use app\classes\Cart;

session_start();
require_once '../vendor/autoload.php';

if (isset($_GET['id'])) {
    $product_id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
    $cart = new Cart();
    $cart->remove_product($product_id);
}

// Redireciona de volta para a página anterior
header("Location: {$_SERVER['HTTP_REFERER']}");
exit();
?>
