<?php
    require_once 'libs/smarty/libs/Smarty.class.php';
    
    class UserView {
        private $smarty;

        function __construct() {
            $this->smarty = new Smarty();
        }

        function showRegister() {
            $this->smarty->display('templates/userRegister.tpl');
        }

        function showLogin() {
            $this->smarty->display('templates/userLogin.tpl');
        }
    }