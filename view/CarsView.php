<?php
    require_once 'libs/smarty/libs/Smarty.class.php';

    class CarsView {
        private $smarty;

        function __construct() {
            $this->smarty = new Smarty();
        }

        function showCarsList($cars, $marksFilter, $totalPages, $actualPage) {
            $this->smarty->assign('tab', 'Lista de autos');
            $this->smarty->assign('mark', '');
            $this->smarty->assign('title', 'autos');
            $this->smarty->assign('cars', $cars);
            $this->smarty->assign('marksFilter', $marksFilter);
            $this->smarty->assign('totalPages', $totalPages);
            $this->smarty->assign('actualPage', $actualPage);
            $this->smarty->assign('userLogged', $_SESSION['user']);
            $this->smarty->assign('rol', $_SESSION['rol']);
            $this->smarty->display('templates/carsList.tpl');
        }

        function showCarsByMark($carsByMark, $marksFilter, $mark, $totalPages, $actualPage) {
            $this->smarty->assign('tab', 'Filtro de autos');
            $this->smarty->assign('mark', $mark);
            // $this->smarty->assign('title', 'autos');
            $this->smarty->assign('cars', $carsByMark);
            $this->smarty->assign('marksFilter', $marksFilter);
            $this->smarty->assign('totalPages', $totalPages);
            $this->smarty->assign('actualPage', $actualPage);
            $this->smarty->assign('userLogged', $_SESSION['user']);
            $this->smarty->assign('rol', $_SESSION['rol']);
            $this->smarty->display('templates/carsList.tpl');
        }

        function showCarDesc($car, $images) {
            $this->smarty->assign('mark', '');
            $this->smarty->assign('tab', $car->marca . ' ' . $car->modelo);
            $this->smarty->assign('car', $car);
            $this->smarty->assign('images', $images);
            $this->smarty->assign('userLogged', $_SESSION['user']);
            $this->smarty->assign('rol', $_SESSION['rol']);
            $this->smarty->display('templates/carDesc.tpl');           
        }
        
        function showMarksList($marks, $message) {
            $this->smarty->assign('mark', '');
            $this->smarty->assign('tab', 'Lista de marcas');
            $this->smarty->assign('title', 'marcas');
            $this->smarty->assign('marks', $marks);
            $this->smarty->assign('message', $message);
            $this->smarty->assign('userLogged', $_SESSION['user']);
            $this->smarty->assign('rol', $_SESSION['rol']);
            $this->smarty->display('templates/marksList.tpl');
        }

        function showAdvancedSearchPage($cars, $message) {
            $this->smarty->assign('tab', 'Busqueda avanzada');
            $this->smarty->assign('mark', '');
            $this->smarty->assign('cars', $cars);
            $this->smarty->assign('message', $message);
            $this->smarty->assign('userLogged', $_SESSION['user']);
            $this->smarty->assign('rol', $_SESSION['rol']);
            $this->smarty->display('templates/advancedSearch.tpl');
        }
    }