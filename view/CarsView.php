<?php
    require_once 'libs/smarty/libs/Smarty.class.php';

    class CarsView {
        private $smarty;

        function __construct() {
            $this->smarty = new Smarty();
        }

        function showCars($cars) {
            $this->smarty->assign('tab', 'Cars Table');
            $this->smarty->assign('mark', '');
            $this->smarty->assign('title', 'autos');
            $this->smarty->assign('cars', $cars);
            $this->smarty->display('templates/carsList.tpl');
        }
        
        function showCarDesc($car) {
            $this->smarty->assign('mark', '');
            $this->smarty->assign('tab', 'Car Description');
            $this->smarty->assign('car', $car);
            $this->smarty->display('templates/carDesc.tpl');            
        }
        
        function showMarksList($marks){
            $this->smarty->assign('mark', '');
            $this->smarty->assign('tab', 'Marks Table');
            $this->smarty->assign('title', 'marcas');
            $this->smarty->assign('marks', $marks);
            $this->smarty->display('templates/marksList.tpl');
        }
        
        function showCarsByMark($mark, $cars) {
            $this->smarty->assign('tab', 'Cars Table');
            $this->smarty->assign('mark', $mark);
            $this->smarty->assign('cars', $cars);
            $this->smarty->display('templates/carsList.tpl');
        }
    }

