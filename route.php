<?php
    require_once 'controller/CarsController.php';
    require_once 'controller/UserController.php';
    require_once 'controller/AdminController.php';
    define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

    if (!empty($_GET['action'])) {
        $action = $_GET['action'];
    }
    else {
        $action = 'cars';
    }
 
    $params = explode('/', $action); 
    $carsController = new CarsController();
    $adminController = new AdminController();
    $userController = new UserController();

    switch ($params[0]) {
        case 'cars':
            $carsController->showCars();
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
        // case 'admin':
        //     $adminController->showAdmin();
        //     break;
        case 'addCar':
            $adminController->addCar();
            break;
        case 'editCar':
            $adminController->editCar();
            break;
        case 'deleteCar':
            $adminController->deleteCar($params[1]);
            break;
        case 'addMark':
            $adminController->addMark();
            break;
        case 'editMark':
            $adminController->editMark();
            break;
        case 'deleteMark':
            $adminController->deleteMark($params[1]);
            break;
        case 'register':
            $userController->userRegister();
            break;
        case 'login':
            $userController->userLogin();
            break;
        default:
            echo 'Error';
            break;       
    }