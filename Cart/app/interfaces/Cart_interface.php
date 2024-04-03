<?php

namespace app\interfaces;

interface Cart_interface
{
    public function add_product($product);
    public function remove_product($product);
    public function quantity($product, $quantity);
    public function clear();
    public function cart(); // pegar os dados do carrinho de compras. 
    public function dump();
}