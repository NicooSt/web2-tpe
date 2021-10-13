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

        function showCars() {
            $cars = $this->model->getCarsList();
            $marksFilter = $this->model->getMarksList();
            $this->view->showCarsList($cars, $marksFilter);
        }

        function showCar($id) {
            $car = $this->model->getCar($id);
            $this->view->showCarDesc($car);
        }

        function showMarks() {
            $marks = $this->model->getMarksList();
            $this->view->showMarksList($marks);
        }

        function filterByMark() {
            if ($_POST['filter'] != 'Todos') {
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