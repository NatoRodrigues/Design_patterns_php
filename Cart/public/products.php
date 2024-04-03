<?php 

use app\classes\Cart;
require_once '../app/classes/Cart.php';
$products = [
    1=>['name' => 'Tênis Nike',  'price' => 199.99],
    2=>['name' => 'Camiseta Adidas',  'price' => 29.99],
    3=>['name' => 'Calça Jeans Slim',  'price' => 49.99],
    4=>['name' => 'Relógio Casio',  'price' => 99.99],
    5=>['name' => 'Fone de Ouvido Bluetooth',  'price' => 39.99],
    6=>['name' => 'Mochila Escolar',  'price' => 24.99],
    7=>['name' => 'Garrafa Térmica',  'price' => 14.99],
    8=>['name' => 'Óculos de Sol',  'price' => 79.99],
    9=>['name' => 'Bola de Futebol',  'price' => 19.99],
    10=>['name' => 'Livro "Aventuras de Sherlock Holmes"',  'price' => 9.99],
    11=>['name' => 'Chapéu de Palha',  'price' => 12.99],
    12=>['name' => 'Cinto de Couro',  'price' => 29.99],
    13=>['name' => 'Bolsa de Viagem',  'price' => 59.99],
    14=>['name' => 'Chinelo Havaianas',  'price' => 19.99],
    15=>['name' => 'Shorts de Praia',  'price' => 34.99],
    16=>['name' => 'Lanterna LED',  'price' => 9.99],
    17=>['name' => 'Capa para Celular',  'price' => 7.99],
    18=>['name' => 'Carregador Portátil',  'price' => 19.99],
    19=>['name' => 'Caneca de Porcelana',  'price' => 8.99],
    20=>['name' => 'Caixa de Ferramentas',  'price' => 39.99],
    21=>['name' => 'Kit de Maquiagem',  'price' => 29.99],
    22=>['name' => 'Cadeira de Praia',  'price' => 24.99],
    23=>['name' => 'Jogo de Panelas',  'price' => 69.99],
    24=>['name' => 'Escova de Dentes Elétrica',  'price' => 39.99],
    25=>['name' => 'Câmera de Ação',  'price' => 79.99],
    26=>['name' => 'Tripé para Celular',  'price' => 14.99],
    27=>['name' => 'Máscara de Dormir',  'price' => 4.99],
    28=>['name' => 'Jogo de Toalhas',  'price' => 19.99],
    29=>['name' => 'Relógio de Parede',  'price' => 24.99],
    30=>['name' => 'Pasta Executiva',  'price' => 49.99],
    31=>['name' => 'Luminária LED',  'price' => 29.99],
    32=>['name' => 'Mini Ventilador USB',  'price' => 9.99],
    33=>['name' => 'Cofrinho de Porco',  'price' => 7.99],
    34=>['name' => 'Almofada Decorativa',  'price' => 12.99],
    35=>['name' => 'Porta-Retratos',  'price' => 8.99],
    36=>['name' => 'Cabo HDMI',  'price' => 4.99],
    37=>['name' => 'Capa para Notebook',  'price' => 19.99],
    38=>['name' => 'Mouse sem Fio',  'price' => 14.99],
    39=>['name' => 'Tapete para Banheiro',  'price' => 9.99],
    40=>['name' => 'Lixeira para Carro',  'price' => 7.99],
    41=>['name' => 'Pulseira de Prata',  'price' => 39.99],
    42=>['name' => 'Anel de Ouro',  'price' => 89.99],
    43=>['name' => 'Brinco de Pérola',  'price' => 29.99],
    44=>['name' => 'Colar de Diamantes',  'price' => 199.99],
    45=>['name' => 'Lenço de Seda',  'price' => 24.99],
    46=>['name' => 'Gravata Borboleta',  'price' => 14.99],
    47=>['name' => 'Relógio de Bolso',  'price' => 49.99],
    48=>['name' => 'Caneta Tinteiro',  'price' => 19.99],
    49=>['name' => 'Papel de Carta',  'price' => 4.99],
    50=>['name' => 'Caderno de Anotações',  'price' => 7.99],
    51=>['name' => 'Porta Canetas',  'price' => 9.99],
    52=>['name' => 'Agenda de Couro',  'price' => 29.99],
    53=>['name' => 'Carteira de Couro',  'price' => 24.99],
    54=>['name' => 'Chaveiro Personalizado',  'price' => 4.99],
    55=>['name' => 'Porta-Chaves Magnético',  'price' => 7.99],
    56=>['name' => 'Escova de Cabelo',  'price' => 9.99],
    57=>['name' => 'Pente de Madeira',  'price' => 14.99],
    58=>['name' => 'Creme Hidratante',  'price' => 19.99],
    59=>['name' => 'Protetor Solar FPS 50',  'price' => 24.99],
    60=>['name' => 'Shampoo Anticaspa',  'price' => 9.99],
    61=>['name' => 'Condicionador Hidratante',  'price' => 9.99],
    62=>['name' => 'Sabonete Líquido',  'price' => 4.99],
    63=>['name' => 'Desodorante Roll-On',  'price' => 7.99],
    64=>['name' => 'Perfume Importado',  'price' => 59.99],
    65=>['name' => 'Esmalte Vermelho',  'price' => 4.99],
    66=>['name' => 'Batom Matte',  'price' => 9.99],
    67=>['name' => 'Paleta de Sombras',  'price' => 19.99],
    68=>['name' => 'Base Facial',  'price' => 14.99],
    69=>['name' => 'Corretivo Líquido',  'price' => 7.99],
    70=>['name' => 'Pincel para Maquiagem',  'price' => 9.99],
    71=>['name' => 'Delineador em Gel',  'price' => 12.99],
    72=>['name' => 'Máscara para Cílios',  'price' => 14.99],
    73=>['name' => 'Removedor de Maquiagem',  'price' => 7.99],
    74=>['name' => 'Creme para Rugas',  'price' => 29.99],
    75=>['name' => 'Loção Pós-Barba',  'price' => 12.99],
    76=>['name' => 'Gel de Barbear',  'price' => 9.99],
    77=>['name' => 'Shampoo para Barba',  'price' => 7.99],
    78=>['name' => 'Cera Modeladora',  'price' => 14.99],
    79=>['name' => 'Tônico Capilar',  'price' => 19.99],
    80=>['name' => 'Condicionador para Barba',  'price' => 9.99],
    81=>['name' => 'Perfume Masculino',  'price' => 24.99],
    82=>['name' => 'Perfume Feminino',  'price' => 24.99],
    83=>['name' => 'Perfume Unissex',  'price' => 24.99],
    84=>['name' => 'Sais de Banho',  'price' => 7.99],
    85=>['name' => 'Vela Aromática',  'price' => 14.99],
    86=>['name' => 'Aromatizador de Ambiente',  'price' => 19.99],
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
    <title>Cart</title>
</head>
<body>
    <h3>Cart: <?= count($cart_products); ?> | <a href="cart.php">Go to cart</a></h3>
    
    <div id="container">
        <ul>
            <?php foreach($products as $index => $product) :?>
                <li>
                    <?= $index ?> - <?= $product['name'] ?>: <?= ' R$ ' .  floatval($product['price']) ?>
                    <a href="add.php?id=<?= $index ?>">Add to cart</a> |  
                    <a href="remove.php?id=<?= $index ?>">Remove from cart</a>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
</body>
</html>




