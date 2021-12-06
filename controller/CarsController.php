<?php
    require_once 'model/CarsModel.php';
    require_once 'view/CarsView.php';
    require_once 'helpers/AuthHelper.php';

    class CarsController {
        private $model;
        private $view;
        private $authHelper;

        function __construct() {
            $this->model = new CarsModel();
            $this->view = new CarsView();
            $this->authHelper = new AuthHelper();
        }

        function showCars() {
            $this->authHelper->checkLoggedIn();
            $cars = $this->model->getCarsList();
            $marksFilter = $this->model->getMarksList();
            $this->view->showCarsList($cars, $marksFilter);
        }

        function showCar($id) {
            $this->authHelper->checkLoggedIn();
            $car = $this->model->getCar($id);
            $this->view->showCarDesc($car, $id);
        }

        function showMarks() {
            $this->authHelper->checkLoggedIn();
            $marks = $this->model->getMarksList();
            $this->view->showMarksList($marks, "");
        }

        function filterByMark() {
            if ($_POST['filter'] != 'Todos') {
                $this->authHelper->checkLoggedIn();
                $mark = $_POST['filter'];
                $carsByMark = $this->model->getByMark($mark);
                $marksFilter = $this->model->getMarksList();
                $this->view->showCarsByMark($carsByMark, $mark, $marksFilter);
            }
            else {
                $this->showCars();
            }
        }
    }