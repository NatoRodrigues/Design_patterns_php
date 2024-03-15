<?php 
    class Singleton{
        private static $instance;
        private function __clone(){ // criar metodo com exceção para proibir a cloagem da classe
            throw new \Exception('Clonagem não permitida (singleton)', 1); 
        }
        public function __wakeup(){  // criar metodo com exceção para proibir a serialização da classe
            throw new \Exception('Serialização não permitida (singleton)');
        }

        private function __construct(){} // criar construtor privado

        public static function get_instance(){   // criar método estático de acesso. geralmente um getInstance
            if (!isset(self::$instance)) {      // verificar se  própriedade $instance da propria classe está setada
                self::$instance = new self();   // Agora deve-se atribuir a propriedade da classe (self se refere a propria classe)
            }                                   // o valor de uma instância da classe;
            return self::$instance;
        } 
        
        public function show_message(){     //função de teste para exibir alguma mensagem
            echo 'test message'; 
        }
    }

    $singleton_instance = Singleton::get_instance(); // agora chama a instancia da classe Singleton através da criação da variavel $singleton_instance, que agora possui a instancia da classe ao chamar o método get_instance -> este metodo get_instance guarda uma instâmcia da classe, por isso é singleton.

    $singleton_instance->show_message(); //após isso basta apenas acessar os métodos através da variavel que agora guarda um objeto, uma nova instância da classe.
    
?>