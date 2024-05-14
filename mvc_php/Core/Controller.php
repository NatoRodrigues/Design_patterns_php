<?php

namespace Core;

use app\classes\Uri;
use app\exceptions\Controller_not_Exist_exception;

class Controller {
    private $uri;
    private $controller;
    private $namespace;
    private $folders = [
        'app\controllers\portal',
        'app\controllers\admin'
    ];

    // Construtor da classe Controller
    public function __construct() {
        // Obtém a URI atual
        $this->uri = Uri::uri();
    }

    // Método para obter o controlador correspondente à URI
    public function get_controller() {
        // Verifica se está na página inicial
        if ($this->is_home()) {
            // Retorna o controlador da página inicial
            return $this->controller_home();
        }
        // Retorna o controlador para outras páginas
        return $this->controller_not_home();
    }

    // Método para lidar com o controlador da página inicial
    private function controller_home() {
        // Verifica se o controlador Home_Controller existe
        if (!$this->controller_exists('Home_Controller')) {
            // Lança uma exceção se o controlador não existir
            throw new Controller_not_Exist_exception("A PÁGINA NÃO EXISTE");
        }
        // Instancia e retorna o controlador
        return $this->instantiate_controller();
    }

    // Método para lidar com o controlador para outras páginas que não sejam a página inicial
    private function controller_not_home() {
        // Obtém o nome do controlador com base na URI
        $controllerName = $this->get_controller_not_home();
        // Verifica se o controlador existe
        if (!$this->controller_exists($controllerName)) {
            // Lança uma exceção se o controlador não existir
            throw new Controller_not_Exist_exception("A PÁGINA NÃO EXISTE");
        }
        // Instancia e retorna o controlador
        return $this->instantiate_controller();
    }

    // Método para verificar se está na página inicial
    private function is_home() {
        // Retorna true se a URI for '/', indicando a página inicial
        return ($this->uri == '/');
    }

    // Método para verificar se um controlador específico existe nos namespaces definidos em $folders
    private function controller_exists($controller) {
        // Itera sobre os namespaces definidos em $folders
        foreach ($this->folders as $folder) {
            // Verifica se a classe do controlador existe em cada namespace
            if (class_exists($folder . '\\' . $controller)) {
                // Atualiza o namespace e o nome do controlador
                $this->namespace = $folder;
                $this->controller = $controller;
                // Retorna true assim que encontrar o controlador
                return true;
            }
        }
        // Retorna false se o controlador não for encontrado em nenhum dos namespaces
        return false;
    }

    // Método para extrair o nome do controlador a partir da URI
    private function get_controller_not_home() {
        // Obtém a URI atual
        $uri = $this->uri;
        // Remove barras no início e no final da URI
        $trimmedUri = trim($uri, '/');
        // Divide a URI em segmentos
        $segments = explode('/', $trimmedUri);
        // Remove e retorna o primeiro segmento
        $firstSegment = array_shift($segments);
        // Converte a primeira letra do segmento em maiúscula e adiciona "_Controller"
        $controllerName = ucfirst($firstSegment) . '_Controller';
        // Retorna o nome do controlador
        return $controllerName;
    }

    // Método para instanciar o controlador
    private function instantiate_controller() {
        // Constrói o nome completo da classe do controlador
        $controller = $this->namespace . '\\' . $this->controller;
        // Retorna uma nova instância do controlador
        return new $controller;
    }
}
