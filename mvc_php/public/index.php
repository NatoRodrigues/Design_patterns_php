<?php 

session_start();

require '../vendor/autoload.php';

class Test_controller {
    public array $data = [];

    public function index(){
        $this->data = [
            'title' => 'curso MVC',
       ];
    }
}

$controller = new Test_controller;
$controller->index();

require '../app/views/index.php';



?>