<?php
    require_once 'libs/smarty/libs/Smarty.class.php';

    class CarsView {
        private $smarty;

        function __construct() {
            $this->smarty = new Smarty();
        }

        function showCars($cars) {
            $this->smarty->assign('title', 'Cars');
            $this->smarty->assign('cars', $cars);
            $this->smarty->display('templates/carsList.tpl');
        }
        
        function showCarDesc($car) {
            $this->smarty->assign('title', 'Car Description');
            $this->smarty->assign('car', $car);
            $this->smarty->display('templates/carDesc.tpl');            
        }
    }