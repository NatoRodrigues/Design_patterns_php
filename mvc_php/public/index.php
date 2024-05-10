<?php 

    //chamar o arquivo que contém o autoload para carregar as Classes+
    require '../bootstrap.php';

    //imaginar como seria o processo de chamar o controller
    $controller = new Controller();
    $controller->getController();
    

    // $method = new Method();
    // $method = $method->getMethod();


    // $parameters = new Params();
    // $param = $parameters->getParams();

    // $controller->method($param);


?>