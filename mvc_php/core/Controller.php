<?php 
namespace Core;

use app\classes\Uri;

class Controller{
    private $uri;
    
    public function __construct(){
        $this->uri = Uri::uri();
    }
}

?>