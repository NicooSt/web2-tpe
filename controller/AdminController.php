<?php
    require_once 'model/AdminModel.php';
    require_once 'view/AdminView.php';

    class AdminController {
        private $model;
        private $view;

        function __construct() {
            $this->model = new AdminModel();
            $this->view = new AdminView();
        }

        // function showAdmin($message = '') {
        //     $cars = $this->model->getCarsList();
        //     $marks = $this->model->getMarksList();
        //     $this->view->showAdminLoc($cars, $marks, $message);
        // }

        function addCar() {
            $car = $this->model->checkCar($_POST['modelo']);
            if (!$car) {
                $this->model->addCarToDB($_POST['modelo'], $_POST['origen'], $_POST['anio'], $_POST['marca']);
                $this->view->showCarsLoc();
            }
            else {
                $this->view->showCarsLoc();
                // $cars = $this->model->getCarsList();
                // $marks = $this->model->getMarksList();
                // $this->showAdmin();
            }
        }
        
        function editCar() {
            $car = $this->model->checkCar($_POST['modeloNuevo']);
            if(!$car) {
                $this->model->editCarFromDB($_POST['modelo'], $_POST['modeloNuevo'], $_POST['origen'], $_POST['anio'], $_POST['marca']);
                $this->view->showCarsLoc();
            }
            else {
                $this->view->showCarsLoc();
            }
        }
        
        function deleteCar($id) {
            $this->model->deleteCarFromDB($id);
            $this->view->showCarsLoc();
        }

        function addMark() {
            $marca = $this->model->checkMark($_POST['marca']);
            if (!$marca) {
                $this->model->addMarkToDB($_POST['marca'], $_POST['origen'], $_POST['anio']);
                $this->view->showMarksLoc();
            }
            else {
                $this->view->showMarksLoc();
            }
        }
        
        function editMark() {
            $marca = $this->model->checkMark($_POST['marcaNueva']);
            if (!$marca) {
                $this->model->editMarkFromDB($_POST['marca'], $_POST['marcaNueva'], $_POST['origen'], $_POST['anio']);
                $this->view->showMarksLoc();
            }
            else {
                $this->view->showMarksLoc();
            }
        }

        function deleteMark($id) {
            $this->model->deleteMarkFromDB($id);
            $this->view->showMarksLoc();
        }
    }