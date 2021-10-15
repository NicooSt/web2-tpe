<?php
    require_once 'model/RegisterModel.php';
    require_once 'view/RegisterView.php';
    
    class RegisterController {
        private $model;
        private $view;

        function __construct() {
            $this->model = new RegisterModel();
            $this->view = new RegisterView();
        }

        function userRegister() {
            $this->view->showRegister();
        }

        function verifyRegister() {
            if ($_POST['user'] != 'INVITADO') {
                if (!empty($_POST['user']) && !empty($_POST['password'])) {
                    $user = strtoupper($_POST['user']);
                    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
                    $checkUser = $this->model->checkUser($user);
                    if (!$checkUser) {
                        $this->model->addUser($user, $password);
                        $this->view->showRegister('Cuenta Creada con exito!');
                    }
                    else {
                        $this->view->showRegister('La cuenta ya existe');
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