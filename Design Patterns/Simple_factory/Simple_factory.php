<?php 
// simple factory - fabrica simples: cria algo ou retorna algo (no caso cria e retornar a instância da classe)

// regras:
// 1 - 1 classe
// 2 - metodo da classe
// 3 - E de acordo com o que vai ser passado por parâmetro, iremos retornnar a instância de uma OUTRA CLASSE

// simple factory com criação de instâncias dinâmicas

//criar interface para fazer com que todas as classes tenham o método drive()


 
class Car_factory {
    public static function create_instance(string $class):Car_action_interface // metodo de criar instancia precisa ser estático
    {
        $class_name = ucfirst($class);
         // verificar se a classe existe, caso exista, vamos instanciar.
        if (!class_exists($class_name)) {
            throw new Exception("A classe {$class_name} não existe", 1);
         }
         // agora caso a classe exista:
        $class = new $class_name;

         // verificar se a classe é do tipo Car_factory
        if (!$class instanceof Car_action_interface) {
            throw new Exception("A classe {$class_name} não pertence a interface especificada", 1);   
         }
        return $class;
    }
}
 

interface Car_action_interface{
    public function drive():string;
}

// dentro de cada uma dessas classes, deve-se ter métodos iguais
class Fusca implements Car_action_interface{
    public function drive():string{
        return 'drive fusca';
    }
}
class Corsa implements Car_action_interface{
    public function drive():string{
        return 'drive fusca';
    }

}
class Corola implements Car_action_interface{
    public function drive():string{
        return 'drive fusca';
    }
}


$car_factory = new Car_factory;
$car_model = $car_factory::create_instance('Fusca');

var_dump($car_model->drive());
?>