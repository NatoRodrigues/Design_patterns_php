<?php 
// padrão de projeto Factory method em php é usado quando você deseja delegar a criação de objetos para subclasses, permitindo que uma classe base especifique a interface para a criação de um objeto, mas permite que as subclasses alterem o tipo de objeto que será criado.

abstract class Electronic_product{
    protected string $name;
    protected float $price;
    public function getName()
    {
        return $this->name;
    }
    public function getPrice()
    {
        return $this->price;
    }
}

class Laptop extends Electronic_product{
    public function __construct(){
        $this->name = "Laptop";
        $this->price = 2399.40;

    }
}

class Smartphone extends Electronic_product{
    public function __construct(){
        $this->name = "Smartphone";
        $this->price = 2199.40;
        
    }
}

// criar interface com método pra criar instancias, objetos dos produtos eletrônicos
interface Electronic_product_factory{
    public function create_product():object;
}

class Laptop_factory implements Electronic_product_factory{
    public function create_product():object{
        return new Laptop;
    }
}

class Smartphone_factory implements  Electronic_product_factory{
    public function create_product():object{
        return new Smartphone;
    }
}

// uso do factory method:
$laptop_factory = new Laptop_factory;
$laptop = $laptop_factory->create_product(); // produto ou factory criado/a.
echo "product:". $laptop->getName() . PHP_EOL;
echo "Price: $" . $laptop->getPrice() . PHP_EOL;

$smartphone_factory = new Smartphone_factory;
$smartphone = $smartphone_factory->create_product(); // Produto ou factory criado/a
echo "Product:" . $smartphone->getName() . PHP_EOL;
echo "Price: $" . $smartphone->getPrice();
?>