<?php
    require_once 'libs/smarty/libs/Smarty.class.php';
    
    class SessionView {
        private $smarty;

    function __construct() {
        $this->smarty = new Smarty();  
    }

    function showLogin($alert = '') {
        $this->smarty->assign('alert', $alert);
        $this->smarty->display('templates/userLogin.tpl');
    }

    function showCarsLocation() {
        header('Location: ' . BASE_URL . 'cars');
    }
}