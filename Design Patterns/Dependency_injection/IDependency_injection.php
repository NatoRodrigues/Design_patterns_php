<?php

namespace app;

interface Pagamento {

    public function processar();
  }
  

class Carrinho
{
    private $pagamento;
    public function __construct(Pagamento $pagamento) {
        $this->pagamento = $pagamento;
      }
    
      public function processarPagamento() { 
        $this->pagamento->processar();
      }
}

class PagSeguro implements Pagamento 
{

    public function processar() {
      // Lógica de processamento do PagSeguro
      echo "Processando pagamento com PagSeguro...";
    }
}
  
  class Paypal implements Pagamento 
{
  
    public function processar() {
      // Lógica de processamento do Paypal
      echo "Processando pagamento com Paypal...";
    }
}

$metodo_pagamento = new Paypal();
$carrinho = new Carrinho($metodo_pagamento);
$carrinho->processarPagamento();



  