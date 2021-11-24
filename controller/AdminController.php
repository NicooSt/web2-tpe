<?php
    require_once 'model/AdminModel.php';
    require_once 'view/AdminView.php';
    require_once 'helpers/AuthHelper.php';

    class AdminController {
        private $model;
        private $view;

        function __construct() {
            $this->model = new AdminModel();
            $this->view = new AdminView();
            $this->authHelper = new AuthHelper();
        }
        
        function showAddCar() {
            $this->authHelper->checkLoggedIn();
            $marks = $this->model->getMarksList();
            $this->view->showAddCarPage($marks);
        }

        function addCar() {
            $this->authHelper->checkLoggedIn();
            if (!empty($_POST['modelo']) && !empty($_POST['origen']) && !empty($_POST['anio'])) {
                $this->model->addCarToDB($_POST['modelo'], $_POST['marca'], $_POST['origen'], $_POST['anio']);
                $this->view->showCarsLoc();   
            }
            else {
                $this->view->showCarsLoc();
            }
        }
            
        function showEditCar($id) {
            $this->authHelper->checkLoggedIn();
            $car = $this->model->getCar($id);
            $marks = $this->model->getMarksList();
            $this->view->showEditCarPage($id, $marks, $car);
        }

        function editCar($id) {
            $this->authHelper->checkLoggedIn();
            if (!empty($_POST['modeloNuevo']) && !empty($_POST['origen']) && !empty($_POST['anio'])) {
                $this->model->editCarFromDB($_POST['modeloNuevo'], $_POST['marca'], $_POST['origen'], $_POST['anio'], $id);
                $this->view->showCarsLoc();
            }
            else {
                $this->view->showCarsLoc();
            }
        }

        function deleteCar($id) {
            $this->authHelper->checkLoggedIn();
            $this->model->deleteCarFromDB($id);
            $this->view->showCarsLoc();
        }

        function showAddMark() {
            $this->authHelper->checkLoggedIn();
            $this->view->showAddMarkPage();
        }

        function addMark() {
            $this->authHelper->checkLoggedIn();
            if (!empty($_POST['marcaNueva']) && !empty($_POST['origen']) && !empty($_POST['fundacion'])) {
                $marca = $this->model->checkMark($_POST['marca']);
                if (!$marca) {
                    $this->model->addMarkToDB($_POST['marcaNueva'], $_POST['origen'], $_POST['fundacion']);
                    $this->view->showMarksLoc();
                }
                else {
                    $this->view->showMarksLoc();
                }
            }
            else {
                $this->view->showMarksLoc();
            }
        }

        function showEditMark($id) {
            $this->authHelper->checkLoggedIn();
            $markTitle = $this->model->getMark($id);
            $marks = $this->model->getMarksList();
            $this->view->showEditMarkPage($id, $marks, $markTitle);
        }

        function editMark($id) {
            $this->authHelper->checkLoggedIn();
            if (!empty($_POST['marcaNueva']) && !empty($_POST['origen']) && !empty($_POST['fundacion'])) {
                $marca = $this->model->checkMark($_POST['marcaNueva']);
                if (!$marca) {
                    $this->model->editMarkFromDB($id, $_POST['marcaNueva'], $_POST['origen'], $_POST['fundacion']);
                    $this->view->showMarksLoc();
                }
                else {
                    $this->view->showMarksLoc();
                }
            }
            else {
                $this->view->showMarksLoc();              
            }
        }

        function deleteMark($id) {
            $this->authHelper->checkLoggedIn();
            $this->model->deleteMarkFromDB($id);
            $this->view->showMarksLoc();
        }
        
        function showAdmin() {
            $this->authHelper->checkLoggedIn();
            $users = $this->model->getUsers();
            $this->view->showAdminPage($users, '', '');
        }

        function assignRol() {
            $this->authHelper->checkLoggedIn();
            $users = $this->model->getUsers();
            if ($_POST['user'] != 'Seleccione' && $_POST['userRol'] != 'Seleccione') {
                $userName = $_POST['user'];
                $userRol = $_POST['userRol'];
                if ($userRol == 'Administrador') {
                    $userRol = 'admin';
                } else if ($userRol == 'Usuario') {
                    $userRol = 'user';
                }
                $this->model->editUser($userName, $userRol);
                $this->view->showAdminPage($users, "Los cambios se realizaron con exito", "");
            } else {
                $this->view->showAdminPage($users, "", "Seleccione un usuario y un rol de usuario");
            }
        }

        function deleteUser() {
            $this->authHelper->checkLoggedIn();
            if ($_POST['user'] != 'Seleccione') {
                $userName = $_POST['user'];
                $this->model->deleteUserFromDB($userName);
                $users = $this->model->getUsers();
                $this->view->showAdminPage($users, "", "Los cambios se realizaron con exito");
            } else {
                $users = $this->model->getUsers();
                $this->view->showAdminPage($users, "", "Seleccione un usuario");
            }
        }
    }