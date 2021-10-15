<?php
    require_once 'model/SessionModel.php';
    require_once 'view/SessionView.php';
    
    class SessionController {
        private $model;
        private $view;

        function __construct() {
            $this->model = new SessionModel();
            $this->view = new SessionView();
        }

        function userLogin() {
            $message = '';
            $this->userLogout($message);
            $this->view->showLogin();
        }

        function userLogout($message = ''){
            session_start();
            session_destroy();
            if ($message == '') {
                $this->view->showLogin($message);
            }
            else {
                $this->view->showLogin('Sesion cerrada!');
            }
        }

        function verifyLogin() {
            if (!empty($_POST['user']) && !empty($_POST['password'])) {
                $user = strtoupper($_POST['user']);
                $pass = $_POST['password'];
                $getUser = $this->model->getUser($user);
                if ($getUser && password_verify($pass, $getUser->password)) {
                    session_start();
                    $_SESSION['user'] = $user;
                    $this->view->showCarsLocation();
                }
                else {
                    $this->view->showLogin('Usuario o contraseña incorrecto');
                } 
            }
            else {
                $this->view->showLogin('Complete todos los campos');
            }
        }

        function invitado() {
            session_start();
            $_SESSION['user'] = 'INVITADO';
            $this->view->showCarsLocation();
        }
    }