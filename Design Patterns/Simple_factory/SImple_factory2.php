<?php 

interface Login_factory_interface{
    public function logar($email, $password):string;
}


class Login_factory{
    public static function make(string $type):Login_factory_interface{
        switch ($type) {
            case 'admin':
                return new Admin();
                break;
            case 'user':
                return new User();
                break;
            case 'guest':
                return new Guest();
                break;
            default:
                throw new Exception("Class of type {$type} doesn't exist");
                break;
        }
    }
}

class User implements Login_factory_interface{
    public function logar($email, $password):string{
        return 'login user';
    }
}
class Admin implements Login_factory_interface{
    public function logar($email, $password):string{
        return 'login admin';
    }
}
class Guest implements Login_factory_interface{
    public function logar($email, $password):string{
        return 'login guest';
    }
}


$login_instance = Login_factory::make('admin');
var_dump($login_instance->logar('admin@gmail.com', 'admin'));

 

// var_dump($login_instance->make('admin'));

?>