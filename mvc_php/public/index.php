<?php

use Core\Controller;
use Core\Method;

require '../bootstrap.php';

$controllerInstance = (new Controller())->get_controller();
$method = (new Method())->load_method($controllerInstance);

$controllerInstance->$method();
