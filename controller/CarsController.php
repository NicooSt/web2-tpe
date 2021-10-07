<?php
    require_once 'model/CarsModel.php';
    require_once 'view/CarsView.php';

    class CarsController {
        private $model;
        private $view;

        function __construct() {
            $this->model = new CarsModel();
            $this->view = new CarsView();
        }

        function showHome() {
            $cars = $this->model->getCarsList();
            $this->view->showCars($cars);
        }

        function showCar($id) {
            $car = $this->model->getCar($id);
            $this->view->showCarDesc($car);
        }
    }