<?php
    require_once 'controller/CarsController.php';
    require_once 'controller/UserController.php';
    define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

    if (!empty($_GET['action'])) {
        $action = $_GET['action'];
    }
    else {
        $action = 'home';
    }
 
    $params = explode('/', $action); 
    $carsController = new CarsController();
    $userController = new UserController();

    switch ($params[0]) {
        case 'home':
            $carsController->showHome();
            break;
        case 'viewCar':
            $carsController->showCar($params[1]);
            break;
        case 'marks':
            $carsController->showMarks();
            break;
        case 'filter':
            $carsController->filterByMark();
            break;
        case 'register':
            $userController->userRegister();
            break;
        default:
            echo 'Error';
            break;       
    }