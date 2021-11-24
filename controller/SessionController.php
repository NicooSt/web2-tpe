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
            $this->view->showLogin('');
        }

        function userLogout() {
            session_start();
            session_destroy();
            $this->view->showLogin('Sesión cerrada!');
        }

        function verifyLogin() {
            if (!empty($_POST['user']) && !empty($_POST['password'])) {
                $this->verify($_POST['user'], $_POST['password']); 
            }
            else {
                $this->view->showLogin('Complete todos los campos');
            }
        }

        function verifyRegisterLogin($userNewReg, $passNewReg) {
            if ($userNewReg != null && $passNewReg != null) {
                $this->verify($userNewReg, $passNewReg); 
            }
            else {
                $this->view->showLogin('Complete todos los campos');
            }
        }

        function verify($userParam, $passParam) {
            $user = strtoupper($userParam);
            $pass = $passParam;
            $getUser = $this->model->getUser($user);
            if ($getUser && password_verify($pass, $getUser->password)) {
                session_start();
                $_SESSION['user'] = $user;
                if ($getUser->rol == "admin") {
                    $_SESSION['rol'] = $getUser->rol;
                } else if ($getUser->rol == "user") {
                    $_SESSION['rol'] = $getUser->rol;
                }
                $this->view->showCarsLocation();
            }
            else {
                $this->view->showLogin('Usuario o contraseña incorrecto');
            } 
        }
    }