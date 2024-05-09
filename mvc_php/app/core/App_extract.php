<?php

namespace app\core;

class App_extract
{

    public array $uri = [];
    private string $controller = 'Home';
    public function controller():string {
        $this->uri = explode('/', $_SERVER['REQUEST_URI']);
        if (isset($this->uri[0]) && $this->uri[0] !== '') {
            $this->controller() = ucfirst($this->uri[0]);
        }

        $namespace_controllers = "app\\controllers\\".$this->controller();
        if (class_exists($namespace_controllers)) {
            $this->controller() = $namespace_controllers;
        }
    }

    public function method(){
    }

    public function params(){

    }
}