<?php
    require_once 'controller/CarsController.php';
    require_once 'controller/AdminController.php';
    require_once 'controller/SessionController.php';
    require_once 'controller/RegisterController.php';
    define('BASE_URL', '//'. $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

    if (!empty($_GET['action'])) {
        $action = $_GET['action'];
    }
    else {
        $action = 'cars';
    }
 
    $params = explode('/', $action);
    // Dirigido a pagina principal va a lista de pagina 1
    if (empty($params[1])) {
        $params[1] = 1;
    }
    $carsController = new CarsController();
    $adminController = new AdminController();
    $sessionController = new SessionController();
    $registerController = new RegisterController();

    switch ($params[0]) {
        case 'cars':
            // $params[1] = pagina
            $carsController->showCars($params[1]);
            break;
        case 'viewCar':
            $carsController->showCar($params[1]);
            break;
        case 'marks':
            $carsController->showMarks();
            break;
        case 'filter':
            if (empty($params[2])) {
                $params[2] = "";
            }
            // $params[1] = pagina, params[2] = marca
            $carsController->filterByMark($params[1], $params[2]);
            break;
        case 'showAdvancedSearch':
            $carsController->showAdvancedSearch();
            break;
        case 'advancedSearch':
            $carsController->advancedSearch();
            break;
        case 'showAddCar':
            $adminController->showAddCar();
            break;
        case 'addCar':
            $adminController->addCar();
            break;
        case 'showEditCar':
            $adminController->showEditCar($params[1]);
            break;
        case 'editCar':
            $adminController->editCar($params[1]);
            break;
        case 'deleteCar':
            $adminController->deleteCar($params[1]);
            break;
        case 'showAddCarImages':
            $adminController->showAddCarImages($params[1]);
            break;
        case 'addCarImages':
            $adminController->addCarImages($params[1]);
            break;
        case 'deleteCarImage':
            $adminController->deleteCarImage($params[1], $params[2]);
            break;
        case 'showAddMark':
            $adminController->showAddMark();
            break;
        case 'addMark':
            $adminController->addMark();
            break;
        case 'showEditMark':
            $adminController->showEditMark($params[1]);
            break;
        case 'editMark':
            $adminController->editMark($params[1]);
            break;
        case 'deleteMark':
            $adminController->deleteMark($params[1]);
            break;
        case 'admin':
            $adminController->showAdmin();
            break;
        case 'assignRol':
            $adminController->assignRol();
            break;
        case 'deleteUser':
            $adminController->deleteUser();
            break;
        case 'register':
            $registerController->userRegister();
            break;
        case 'verifyRegister':
            $registerController->verifyRegister();
            break;
        case 'login':
            $sessionController->userLogin();
            break;
        case 'logout':
            $sessionController->userLogout();
            break;
        case 'verifyLogin':
            $sessionController->verifyLogin();
            break;
        default:
            echo 'Error en Route.php';
            break;       
    }