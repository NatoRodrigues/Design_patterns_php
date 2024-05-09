<?php 

    session_start();

    $logged_in = $_SESSION['logged_in']; // vai buscar a sessão com esse ID -> 'logged_in'

    $email = 'teste@gmail.com';
    $password = 'password';

    function login(){
        session_regenerate_id();// SERVE PRA ATUALIZAR O ID SA SESSÃO que no caso é 'logged_in' 
        $_SESSION['logged_in'] = true;
    }

    function logout(){
        $_SESSION = [];
        $params = session_get_cookie_params();
        setcookie('PHPSESSID', '', time() - 3600, $params['path'], $params['domain'],
            $params['secure'], $params['httponly']);

            //os cookies da sessão são atualizados; o ID da sessão é substituido por por uma string em branco com data de expiração setada para o passado. 
        session_destroy(); // após isso a sessão é destruída no servidor. 
    }

    function require_login($logged_in){
        if ($logged_in == false) {
            header('Location: login.php');
            exit();
        }
    }
?>