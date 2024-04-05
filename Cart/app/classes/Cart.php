<?php

namespace app\classes;

require_once '../app/interfaces/Cart_interface.php';

use app\interfaces\Cart_interface;

class Cart implements Cart_interface
{
    public function add_product($product){
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = []; 
        }
        if (!isset($_SESSION['cart'][$product])) { // product é o ID do produto.
            $_SESSION['cart'][$product] = 1; // 1 significa a quantidade do produto especificado que está no carrinho de compras.
        }
        else {
            $_SESSION['cart'][$product]+=1;
        }
    }
    public function remove_product($product){
        // Verifica se o ID do produto está presente no carrinho
        var_dump($_SESSION['cart']);
        if (isset($_SESSION['cart'][$product])) {
            unset($_SESSION['cart'][$product]);
            echo "Produto removido com sucesso!";
          } else {
            echo "Produto não encontrado no carrinho!";
          }
    }
    
    public function quantity($product, $quantity){
        if (isset($_SESSION['cart'][$product])) {
            if ($quantity == 0 || $quantity == '') {
                $this->remove_product($product);
                return;
            }
            $_SESSION['cart'][$product] = $quantity;
        }
    }
    public function clear(){
        if (isset($_SESSION['Cart'])) {
            unset($_SESSION['cart']);
        }
    }

    public function cart(){
        if (isset($_SESSION['cart'])) {
            return $_SESSION['cart'];
        }
        return [];
    }

    public function dump(){
        if (isset($_SESSION['cart'])) {
            var_dump($_SESSION['cart']);
        }
    }
}
