<?php
    require_once 'libs/smarty/libs/Smarty.class.php';

    class AdminView {
        private $smarty;

        function __construct() {
            $this->smarty = new Smarty();
        }

        function showAddCarPage($marks) {
            $this->smarty->assign('tab', 'Agregar auto');
            $this->smarty->assign('mark', '');
            $this->smarty->assign('marks', $marks);
            $this->smarty->assign('userLogged', $_SESSION['user']);
            $this->smarty->display('templates/addCar.tpl');
        }

        function showEditCarPage($id, $marks, $car) {
            $this->smarty->assign('car', $car);
            $this->smarty->assign('marks', $marks);
            $this->smarty->assign('tab', 'Editar auto');
            $this->smarty->assign('mark', '');
            $this->smarty->assign('id', $id);
            $this->smarty->assign('userLogged', $_SESSION['user']);
            $this->smarty->display('templates/editCar.tpl');           
        }
        
        function showAddMarkPage() {
            $this->smarty->assign('tab', 'Agregar marca');
            $this->smarty->assign('mark', '');
            $this->smarty->assign('userLogged', $_SESSION['user']);
            $this->smarty->display('templates/addMark.tpl');
        }
        
        function showEditMarkPage($id, $marks, $markTitle) {
            $this->smarty->assign('id', $id);
            $this->smarty->assign('marks', $marks);
            $this->smarty->assign('markTitle', $markTitle);
            $this->smarty->assign('tab', 'Editar marca');
            $this->smarty->assign('mark', '');
            $this->smarty->assign('userLogged', $_SESSION['user']);
            $this->smarty->display('templates/editMark.tpl');
        }

        function showCarsLoc() {
            header("Location: " . BASE_URL . "cars");
        }
        
        function showMarksLoc() {
            header("Location: " . BASE_URL . "marks");     
        }
    }