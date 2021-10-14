<?php
    require_once 'libs/smarty/libs/Smarty.class.php';

    class CarsView {
        private $smarty;

        function __construct() {
            $this->smarty = new Smarty();
        }

        function showCarsList($cars, $marksFilter) {
            $this->smarty->assign('tab', 'Lista de autos');
            $this->smarty->assign('mark', '');
            $this->smarty->assign('title', 'autos');
            $this->smarty->assign('cars', $cars);
            $this->smarty->assign('marksFilter', $marksFilter);
            $this->smarty->assign('userLogged', $_SESSION['user']);
            $this->smarty->display('templates/carsList.tpl');
        }
        
        function showCarDesc($car) {
            $this->smarty->assign('mark', '');
            $this->smarty->assign('tab', $car->marca . ' ' . $car->modelo);
            $this->smarty->assign('car', $car);
            $this->smarty->assign('userLogged', $_SESSION['user']);
            $this->smarty->display('templates/carDesc.tpl');           
        }
        
        function showMarksList($marks) {
            $this->smarty->assign('mark', '');
            $this->smarty->assign('tab', 'Lista de marcas');
            $this->smarty->assign('title', 'marcas');
            $this->smarty->assign('marks', $marks);
            $this->smarty->assign('userLogged', $_SESSION['user']);
            $this->smarty->display('templates/marksList.tpl');
        }
        
        function showCarsByMark($carsByMark, $mark, $marksFilter) {
            $this->smarty->assign('tab', 'Cars Table');
            $this->smarty->assign('mark', $mark);
            $this->smarty->assign('cars', $carsByMark);
            $this->smarty->assign('marksFilter', $marksFilter);
            $this->smarty->assign('userLogged', $_SESSION['user']);
            $this->smarty->display('templates/carsList.tpl');
        }
    }