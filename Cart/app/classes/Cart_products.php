<?php

namespace app\classes;

use app\interfaces\Cart_interface;

class Cart_products
{
    public function __construct(private Cart_interface $cart_interface)
    {
    }

    public function products()
    {
        $products_in_cart = $this->cart_interface->cart();
        $products_in_database = require __DIR__ . '/../helpers/products.php';

        $products = [];
        $total = 0;

        foreach ($products_in_cart as $product_id => $quantity) {
            $product = $products_in_database[$product_id];
            $products[] = [
                'id' => $product_id,
                'name' => $product['name'],
                'price' => $product['price'],
                'quantity' => $quantity,
                'subtotal' => $quantity * $product['price']
            ];
            $total += $quantity * $product['price'];
        }

        return [
            'products' => $products,
            'total' => $total
        ];
    }
}
