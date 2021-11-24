<?php
    require_once 'controller/SessionController.php';
    require_once 'model/RegisterModel.php';
    require_once 'view/RegisterView.php';
    
    class RegisterController {
        private $sessionController;
        private $model;
        private $view;

        function __construct() {
            $this->sessionController = new SessionController();
            $this->model = new RegisterModel();
            $this->view = new RegisterView();
        }

        function userRegister() {
            $this->view->showRegister();
        }

        function verifyRegister() {
            if (strtoupper($_POST['user']) != 'INVITADO') {
                if (!empty($_POST['user']) && !empty($_POST['password'])) {
                    $user = strtoupper($_POST['user']);
                    $passNewReg = $_POST['password'];
                    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
                    $checkUser = $this->model->checkUser($user);
                    if (!$checkUser) {
                        $this->model->addUser($user, $password, "user");
                        $this->sessionController->verifyRegisterLogin($user, $passNewReg);
                    }
                    else {
                        $this->view->showRegister('El usuario ya existe');
                    }
                }
                else {
                    $this->view->showRegister('Complete todos los campos');
                }
            }
            else {
                $this->view->showRegister('El usuario "invitado" no esta disponible');
            }
       }
    }