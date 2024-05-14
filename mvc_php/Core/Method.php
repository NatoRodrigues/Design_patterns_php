<?php

namespace Core;

use app\classes\Uri;
use app\exceptions\Method_not_Exist_exception;

class Method {
    private $uri;

    // Construtor da classe Method
    public function __construct() {
        // Obtém a URI atual
        $this->uri = Uri::uri();
    }

    // Método para carregar o método do controlador com base na URI
    public function load_method($controller) {
        // Obtém o nome do método da URI
        $method = $this->get_method_name_from_uri();
        // Verifica se o método existe no controlador
        if (!method_exists($controller, $method)) {
            // Lança uma exceção se o método não existir
            throw new Method_not_Exist_exception("{$method} Não existe");
        }
        // Retorna o nome do método
        return $method;
    }

    // Método para obter o nome do método a partir da URI
    private function get_method_name_from_uri() {
        // Divide a URI em segmentos
        $segments = explode('/', trim($this->uri, '/'));
        // Retorna o segundo segmento da URI como nome do método, ou 'index' se não houver segundo segmento
        return (count($segments) > 1) ? $segments[1] : 'index';
    }
}
