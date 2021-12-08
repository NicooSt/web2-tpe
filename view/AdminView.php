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
            $this->smarty->assign('rol', $_SESSION['rol']);
            $this->smarty->display('templates/addCar.tpl');
        }

        function showEditCarPage($id, $marks, $car) {
            $this->smarty->assign('car', $car);
            $this->smarty->assign('marks', $marks);
            $this->smarty->assign('tab', 'Editar auto');
            $this->smarty->assign('mark', '');
            $this->smarty->assign('id', $id);
            $this->smarty->assign('userLogged', $_SESSION['user']);
            $this->smarty->assign('rol', $_SESSION['rol']);
            $this->smarty->display('templates/editCar.tpl');           
        }

        function showAddCarImagesPage($car, $images, $message) {
            $this->smarty->assign('car', $car);
            $this->smarty->assign('images', $images);
            $this->smarty->assign('message', $message);
            $this->smarty->assign('tab', 'Agregar imágen');
            $this->smarty->assign('mark', '');
            $this->smarty->assign('userLogged', $_SESSION['user']);
            $this->smarty->assign('rol', $_SESSION['rol']);
            $this->smarty->display('templates/addCarImage.tpl');
        }
        
        function showAddMarkPage() {
            $this->smarty->assign('tab', 'Agregar marca');
            $this->smarty->assign('mark', '');
            $this->smarty->assign('userLogged', $_SESSION['user']);
            $this->smarty->assign('rol', $_SESSION['rol']);
            $this->smarty->display('templates/addMark.tpl');
        }
        
        function showEditMarkPage($id, $marks, $markTitle) {
            $this->smarty->assign('id', $id);
            $this->smarty->assign('marks', $marks);
            $this->smarty->assign('markTitle', $markTitle);
            $this->smarty->assign('tab', 'Editar marca');
            $this->smarty->assign('mark', '');
            $this->smarty->assign('userLogged', $_SESSION['user']);
            $this->smarty->assign('rol', $_SESSION['rol']);
            $this->smarty->display('templates/editMark.tpl');
        }

        function showAdminPage($users, $messageRol, $messageDelete) {
            $this->smarty->assign('users', $users);
            $this->smarty->assign('tab', 'Administración');
            $this->smarty->assign('mark', '');
            $this->smarty->assign('userLogged', $_SESSION['user']);
            $this->smarty->assign('rol', $_SESSION['rol']);
            $this->smarty->assign('messageRol', $messageRol);
            $this->smarty->assign('messageDelete', $messageDelete);
            $this->smarty->display('templates/adminPage.tpl');
        }

        function showCarsLoc() {
            header("Location: " . BASE_URL . "cars");
        }
        
        function showMarksLoc() {
            header("Location: " . BASE_URL . "marks");     
        }
    }