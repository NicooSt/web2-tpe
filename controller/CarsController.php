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

        function showCars($actualPage) {
            $this->authHelper->checkLoggedIn();
            // Consigo los autos de la pagina actual
            $cars = $this->model->getCarsPerPage($actualPage, "cars");
            // Consigo la cantidad total de paginas necesarias
            $totalPages = $this->model->getNumOfPages("cars");
            // Consigo todas las marcas
            $marksFilter = $this->model->getMarksList();
            $this->view->showCarsList($cars, $marksFilter, $totalPages, $actualPage);
        }

        function showCar($id) {
            $this->authHelper->checkLoggedIn();
            $car = $this->model->getCar($id);
            $images = $this->model->getCarImages($id);
            if ($images) {
                $this->view->showCarDesc($car, $images);
            } else {
                $this->view->showCarDesc($car, '');
            }
        }

        function showMarks() {
            $this->authHelper->checkLoggedIn();
            $marks = $this->model->getMarksList();
            $this->view->showMarksList($marks, "");
        }

        function filterByMark($actualPage, $mark) {
            if (isset($_POST['filter'])) {
                if ($_POST['filter'] != 'Todos') {
                    $this->authHelper->checkLoggedIn();
                    $mark = $_POST['filter'];
                    // Consigo los autos de la marca indicada
                    $carsByMark = $this->model->getCarsPerPage($actualPage, $mark);
                    if (!$carsByMark) {
                        // Si no hay autos cargados, la paginacion no se muestra
                        // tampoco se itera para mostrar en la tabla
                        $carsByMark[0] = "";
                    }
                    // Consigo la cantidad total de paginas necesarias
                    // Paso por parametro los autos de la marca indicada
                    $totalPages = $this->model->getNumOfPages($mark);
                    // Consigo todas las marcas
                    $marksFilter = $this->model->getMarksList();
                    $this->view->showCarsByMark($carsByMark, $marksFilter, $mark, $totalPages, $actualPage);
                }
                else {
                    $this->showCars($actualPage);
                }
            } else {
                $this->authHelper->checkLoggedIn();
                $carsByMark = $this->model->getCarsPerPage($actualPage, $mark);
                $totalPages = $this->model->getNumOfPages($mark);
                $marksFilter = $this->model->getMarksList();
                $this->view->showCarsByMark($carsByMark, $marksFilter, $mark, $totalPages, $actualPage);
            }
        }

        function showAdvancedSearch() {
            $this->authHelper->checkLoggedIn();
            $this->view->showAdvancedSearchPage('', '');
        }

        function advancedSearch() {
            $this->authHelper->checkLoggedIn();
            $empty = $this->checkEmpty($_POST);
            if ($empty) {
                $this->view->showAdvancedSearchPage('', 'Complete algún campo');
            } else {
                $cars = $this->model->getAdvancedSearch($_POST);
                if ($cars) {
                    $this->view->showAdvancedSearchPage($cars, '');
                } else {
                    $this->view->showAdvancedSearchPage('', 'No existen autos que cumplan con esas condiciones');
                }
            }
        }

        function checkEmpty($params) {
            $empty = true;
            foreach ($params as $param => $value) {
                if ($params[$param] != "") {
                    $empty = false;
                    break;
                } else {
                    $empty = true;
                }
            }
            return $empty;
        }
    }