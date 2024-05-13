<?php 

    //chamar o arquivo que contém o autoload para carregar as Classes+


    require '../bootstrap.php';
    use Core\Controller;
    use app\classes\Uri;




        //imaginar como seria o processo de chamar o controller
        try {
            $controller = new Controller();
            $controller->get_controller();
            dd($controller);
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    
    


    // $method = new Method();
    // $method = $method->getMethod();


    // $parameters = new Params();
    // $param = $parameters->getParams();

    // $controller->method($param);


?>