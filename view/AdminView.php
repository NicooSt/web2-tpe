<?php
    require_once 'libs/smarty/libs/Smarty.class.php';

    class AdminView {
        private $smarty;

        function __construct() {
            $this->smarty = new Smarty();
        }

        // function showAdminLoc($cars, $marks, $message = '') {
        //     $this->smarty->assign('tab', 'Admin');
        //     $this->smarty->assign('mark', '');
        //     $this->smarty->assign('message', $message);
        //     $this->smarty->assign('cars', $cars);
        //     $this->smarty->assign('marks', $marks);
        //     $this->smarty->display('templates/adminLoc.tpl');
        // }

        // function redirectAdminLoc($message) {
        //     header("Location: " . BASE_URL . "admin");
        // }

        function showCarsLoc() {
            header("Location: " . BASE_URL . "cars");
        }
        
        function showMarksLoc() {
            header("Location: " . BASE_URL . "marks");     
        }
    }