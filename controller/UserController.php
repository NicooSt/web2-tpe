<?php
    require_once 'view/userView.php';
    
    class UserController {
        // private $model;
        private $view;

        function __construct() {
            // $this->model = new UserModel();
            $this->view = new UserView();
        }

        function userRegister() {
            $this->view->showRegister();
        }

        function userLogin() {
            $this->view->showLogin();
        }
    }