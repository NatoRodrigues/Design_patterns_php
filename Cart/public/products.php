<?php 

use app\classes\Cart;
require_once '../app/classes/Cart.php';
$products = [
    1=>['name' => 'Tênis Nike Jordan Camuflado', 'price' => 399.99],
    2 => ['name' => 'Camiseta Adidas', 'price' => 49.99],
    3 => ['name' => 'Calça Jeans Slim', 'price' => 89.99],
    4 => ['name' => 'Relógio Casio', 'price' => 149.99],
    5 => ['name' => 'Fone de Ouvido Bluetooth', 'price' => 59.99],
    6 => ['name' => 'Mochila Escolar Faculdade Impermeável Bolsa Resistente', 'price' => 39.99],
    7 => ['name' => 'Garrafa Térmica inox - 450ml', 'price' => 24.99],
    8 => ['name' => 'Óculos de Sol surf - Preto', 'price' => 129.99],
    9 => ['name' => 'Bola de futebol campo Nike Park team DN3607', 'price' => 29.99],
    10 => ['name' => 'Livro "Aventuras de Sherlock Holmes"', 'price' => 19.99],
    11 => ['name' => 'Chapéu de Palha', 'price' => 29.99],
    12 => ['name' => 'Cinto de Couro', 'price' => 49.99],
    13 => ['name' => 'Bolsa de Viagem', 'price' => 99.99],
];


session_start();
$cart = new Cart();

$cart_products = $cart->cart();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>
    <nav class="navbar">
        <div class="container">
            <div class="navbar-header">
                <a href="#" class="logo">TestStore.com</a>
                <button class="navbar-toggler" id="navbar-toggler">
                    <span></span>
                    <span></span>
                    <span></span>
                </button>
            </div>
            <div class="navbar-collapse" id="navbar-collapse">
                <ul class="navbar-nav">
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Products</a></li>
                    <li><a href="#">About</a></li>
                    <li><a href="#">Contact</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <h2>Your Shopping Cart</h2>
        <div class="cart-summary">
            <p>Cart Total: <?= count($cart_products); ?> item(s)</p>
            <p><a href="cart.php">View Cart</a> | <a href="clear.php">Clear Cart</a></p>
        </div>
        
        <div class="cart-items">
            <?php foreach($products as $index => $product) :?>
                <div class="cart-item">
                    <div class="product-thumbnail">
                        <img src="assets/images/<?= $index ?>.jpg" alt="<?= $product['name'] ?>">
                    </div>
                    <div class="cart-item-details">
                        <h3><?= $product['name'] ?></h3>
                        <p> R$ <?= number_format($product['price'], 2) ?></p>
                    </div>
                    <div class="cart-item-actions">
                        <a href="add.php?id=<?= $index ?>" class="add-to-cart">Add to Cart</a>
                        <a href="remove.php?id=<?= $index ?>" class="remove-from-cart">Remove</a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <script>
        document.getElementById('navbar-toggler').addEventListener('click', function() {
            document.getElementById('navbar-collapse').classList.toggle('show');
        });
    </script>
</body>
</html>




















