<?php
    require_once 'libs/smarty/libs/Smarty.class.php';
    
    class RegisterView {
        private $smarty;

        function __construct() {
            $this->smarty = new Smarty();
        }

        function showRegister($alert = '') {
            $this->smarty->assign('alert', $alert);
            $this->smarty->display('templates/userRegister.tpl');
        }
    }