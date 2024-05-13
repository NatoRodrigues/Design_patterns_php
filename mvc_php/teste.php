<?php

require 'bootstrap.php';
use Core\Controller;
use app\exceptions\Controller_not_Exist_exception;

// Criando uma instância do Controller
$controller = new Controller();

// Testando o método controller_exists com um controlador existente
$controllerExists = $controller->testControllerExists('Home_Controller');
echo "Controlador 'Home_Controller' existe: " . ($controllerExists ? 'Sim' : 'Não') . "\n";

try {
    // Testando o método controller_exists com um controlador inexistente
    $controllerExists = $controller->testControllerExists('Testando_Controller');
    echo "Controlador 'Testando_Controller' existe: " . ($controllerExists ? 'Sim' : 'Não') . "\n";
} catch (Controller_not_Exist_exception $e) {
    echo "Exceção: " . $e->getMessage() . "\n";
}

?>
