<?php
    require_once 'controller/CarsController.php';
    define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

    if (!empty($_GET['action'])) {
        $action = $_GET['action'];
    }
    else {
        $action = 'home';
    }

    
    $params = explode('/', $action);
    $carsController = new CarsController();

    switch ($params[0]) {
        case 'home':
            $carsController->showHome();
            break;
        case 'viewCar':
            $carsController->showCar($params[1]);
            break;
        default:
            echo 'Error';
            break;           
    }