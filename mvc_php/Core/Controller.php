<?php

namespace Core;

use app\classes\Uri;
use app\exceptions\Controller_not_Exist_exception;

class Controller {
    private $uri; // Armazena a URI atual
    private $controller; // Armazena o nome do controlador
    private $namespace; // Armazena o namespace do controlador
    private $folders = [ // Lista de namespaces onde os controladores podem estar
        'app\controllers\portal',
        'app\controllers\admin'
    ];

    // Método construtor que inicializa a propriedade $uri com a URI atual
    public function __construct(){
        $this->uri = Uri::uri(); // Obtém a URI atual
    }

    // Método principal para obter o controlador adequado com base na URI
    public function get_controller() {
        if ($this->is_home()) { // Verifica se está na página inicial
            echo 'controlador home';
            return $this->controller_home(); // Retorna o controlador da página inicial
        }
        return $this->controller_not_home(); // Retorna o controlador para outras páginas
    }

    // Método para lidar com o controlador da página inicial
    private function controller_home(){
        if (!$this->controller_exists('Home_Controller')){ // Verifica se o controlador Home_Controller existe
            throw new Controller_not_Exist_exception("A PÁGINA NÃO EXISTE"); // Lança uma exceção se o controlador não existir
        }
        return $this->instantiate_controller(); // Instancia e retorna o controlador
    }

    // Método para lidar com o controlador para outras páginas que não sejam a página inicial
    private function controller_not_home(){
        $controllerName = $this->get_controller_name_from_uri(); // Obtém o nome do controlador com base na URI

        if (!$this->controller_exists($controllerName)) { // Verifica se o controlador existe
            throw new Controller_not_Exist_exception("A PÁGINA NÃO EXISTE"); // Lança uma exceção se o controlador não existir
        }

        return $this->instantiate_controller(); // Instancia e retorna o controlador
    }

    // Método para verificar se está na página inicial
    private function is_home(){
        return ($this->uri == '/'); // Retorna true se a URI for '/', indicando a página inicial
    }

    // Método para verificar se um controlador específico existe nos namespaces definidos em $folders
    private function controller_exists($controller){
        foreach ($this->folders as $folder) { // Itera sobre os namespaces definidos em $folders
            if (class_exists($folder . '\\' . $controller)) { // Verifica se a classe do controlador existe em cada namespace
                $this->namespace = $folder; // Atualiza o namespace
                $this->controller = $controller; // Atualiza o nome do controlador
                return true; // Retorna true assim que encontrar o controlador
            }
        }
        return false; // Retorna false se o controlador não for encontrado em nenhum dos namespaces
    }

    // Método para instanciar o controlador
    private function instantiate_controller(){
        $controller = $this->namespace . '\\' . $this->controller; // Constrói o nome completo da classe do controlador
        return new $controller; // Retorna uma nova instância do controlador
    }

    // Método para extrair o nome do controlador a partir da URI
    private function get_controller_name_from_uri(){
        $segments = explode('/', trim($this->uri, '/')); // Divide a URI em segmentos
        return ucfirst(array_shift($segments)) . '_Controller'; // Retorna o nome do controlador baseado no primeiro segmento da URI
    }
}
?>
