<?php
use app\classes\Cart;
use app\classes\Cart_products;
session_start();

require '../vendor/autoload.php';

$cart_products = new Cart_products(new Cart);
$products = $cart_products->products();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
</head>
<body>
    <h2>Cart | <a href="/">Home</a></h2>
    <hr>
    <div id='container'>
        <?php if (count($products['products']) <= 0): ?>
            <h3>Nenhum produto no carrinho de compras</h3>
        <?php else: ?>
        <?php var_dump($products['products']); ?>
            <ul>
                <?php foreach ($products['products'] as $product): ?>
                    <li class="cart-product">
                        <?= $product['name']; ?> - Quantity: <?= $product['quantity']; ?> - Price: <?= $product['price']; ?> - Subtotal: <?= $product['subtotal']; ?>
                    </li>
                <?php endforeach ?>
            </ul>
            <p>Total: <?= $products['total']; ?></p>
        <?php endif ?> 
    </div>
</body>
</html>
