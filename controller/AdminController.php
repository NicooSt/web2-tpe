<?php
    require_once 'model/AdminModel.php';
    require_once 'view/AdminView.php';
    require_once 'view/CarsView.php';
    require_once 'helpers/AuthHelper.php';

    class AdminController {
        private $model;
        private $view;
        private $carsview;

        function __construct() {
            $this->model = new AdminModel();
            $this->view = new AdminView();
            $this->carsview = new CarsView();
            $this->authHelper = new AuthHelper();
        }
        
        function showAddCar() {
            $this->authHelper->checkLoggedIn();
            $marks = $this->model->getMarksList();
            $this->view->showAddCarPage($marks);
        }

        function addCar() {
            $this->authHelper->checkLoggedIn();
            if (!empty($_POST['modelo']) && !empty($_POST['origen']) && !empty($_POST['anio'])) {
                $this->model->addCarToDB($_POST['modelo'], $_POST['marca'], $_POST['origen'], $_POST['anio']);
                $this->view->showCarsLoc();   
            }
            else {
                $this->view->showCarsLoc();
            }
        }
            
        function showEditCar($id) {
            $this->authHelper->checkLoggedIn();
            $car = $this->model->getCar($id);
            $marks = $this->model->getMarksList();
            $this->view->showEditCarPage($id, $marks, $car);
        }

        function editCar($id) {
            $this->authHelper->checkLoggedIn();
            if (!empty($_POST['modeloNuevo']) && !empty($_POST['origen']) && !empty($_POST['anio'])) {
                $this->model->editCarFromDB($_POST['modeloNuevo'], $_POST['marca'], $_POST['origen'], $_POST['anio'], $id);
                $this->view->showCarsLoc();
            }
            else {
                $this->view->showCarsLoc();
            }
        }

        function deleteCar($id) {
            $this->authHelper->checkLoggedIn();
            $this->model->deleteCarFromDB($id);
            $this->view->showCarsLoc();
        }
        
        function showAddCarImages($id) {
            $this->authHelper->checkLoggedIn();
            $car = $this->model->getCar($id);
            $images = $this->model->getImages($id);
            if ($images) {
                $this->view->showAddCarImagesPage($car, $images, '');
            } else {
                $this->view->showAddCarImagesPage($car, '', '');
            }
        }

        function addCarImages($id) {
            $this->authHelper->checkLoggedIn();
            if ($_FILES['inp-carImages']['name'][0] != "") {
                $imagesTempPaths = $_FILES['inp-carImages']['tmp_name'];
                $imagesType = $_FILES['inp-carImages']['type'];
                $checkImgExtension = $this->checkImgExtension($imagesType);
                if ($checkImgExtension) {
                    $this->model->addCarImagesToDB($id, $imagesTempPaths);
                    $car = $this->model->getCar($id);
                    $images = $this->model->getImages($id);
                    $this->view->showAddCarImagesPage($car, $images, 'Las imágenes se insertaron correctamente');
                } else {
                    $images = $this->model->getImages($id);
                    if ($images) {
                        $car = $this->model->getCar($id);
                        $this->view->showAddCarImagesPage($car, $images, 'La imágen debe ser .jpg, .jpeg o .png');
                    } else {
                        $car = $this->model->getCar($id);
                        $this->view->showAddCarImagesPage($car, '', 'La imágen debe ser .jpg, .jpeg o .png');   
                    }
                }
            } else {
                $images = $this->model->getImages($id);
                if ($images) {
                    $car = $this->model->getCar($id);
                    $this->view->showAddCarImagesPage($car, $images, 'Selecciona una imágen');
                } else {
                    $car = $this->model->getCar($id);
                    $this->view->showAddCarImagesPage($car, '', 'Selecciona una imágen');
                }
            }
        }

        function checkImgExtension($imagesType) {
            foreach ($imagesType as $imageType) {
                if ($imageType != "image/jpg" && $imageType != "image/jpeg" && $imageType != "image/png") {
                    return false;
                }
            }
            return true;
        }

        function deleteCarImage($idCar, $idImage) {
            $this->authHelper->checkLoggedIn();
            $this->model->deleteCarImageFromDB($idImage);
            $images = $this->model->getImages($idCar);
            if ($images) {
                $car = $this->model->getCar($idCar);
                $this->view->showAddCarImagesPage($car, $images, '');
            } else {
                $car = $this->model->getCar($idCar);
                $this->view->showAddCarImagesPage($car, '', '');
            }
        }

        function showAddMark() {
            $this->authHelper->checkLoggedIn();
            $this->view->showAddMarkPage();
        }

        function addMark() {
            $this->authHelper->checkLoggedIn();
            if (!empty($_POST['marcaNueva']) && !empty($_POST['origen']) && !empty($_POST['fundacion'])) {
                $marca = $this->model->checkMark($_POST['marca']);
                if (!$marca) {
                    $this->model->addMarkToDB($_POST['marcaNueva'], $_POST['origen'], $_POST['fundacion']);
                    $this->view->showMarksLoc();
                }
                else {
                    $this->view->showMarksLoc();
                }
            }
            else {
                $this->view->showMarksLoc();
            }
        }

        function showEditMark($id) {
            $this->authHelper->checkLoggedIn();
            $markTitle = $this->model->getMark($id);
            $marks = $this->model->getMarksList();
            $this->view->showEditMarkPage($id, $marks, $markTitle);
        }

        function editMark($id) {
            $this->authHelper->checkLoggedIn();
            if (!empty($_POST['marcaNueva']) && !empty($_POST['origen']) && !empty($_POST['fundacion'])) {
                $marca = $this->model->checkMark($_POST['marcaNueva']);
                if (!$marca) {
                    $this->model->editMarkFromDB($id, $_POST['marcaNueva'], $_POST['origen'], $_POST['fundacion']);
                    $this->view->showMarksLoc();
                }
                else {
                    $this->view->showMarksLoc();
                }
            }
            else {
                $this->view->showMarksLoc();              
            }
        }

        function deleteMark($id) {
            $this->authHelper->checkLoggedIn();
            $cars = $this->model->checkCar($id);
            if (!$cars) {
                $this->model->deleteMarkFromDB($id);
                $this->view->showMarksLoc();
            } else {
                $marks = $this->model->getMarksList();
                $this->carsview->showMarksList($marks, "No se puede eliminar marcas con autos asociados");
            }
        }
        
        function showAdmin() {
            $this->authHelper->checkLoggedIn();
            $users = $this->model->getUsers();
            $this->view->showAdminPage($users, '', '');
        }

        function assignRol() {
            $this->authHelper->checkLoggedIn();
            $users = $this->model->getUsers();
            if ($_POST['user'] != 'Seleccione' && $_POST['userRol'] != 'Seleccione') {
                $userName = $_POST['user'];
                $userRol = $_POST['userRol'];
                if ($userRol == 'Administrador') {
                    $userRol = 'admin';
                } else if ($userRol == 'Usuario') {
                    $userRol = 'user';
                }
                $this->model->editUser($userName, $userRol);
                $this->view->showAdminPage($users, "Los cambios se realizaron con exito", "");
            } else {
                $this->view->showAdminPage($users, "", "Seleccione un usuario y un rol de usuario");
            }
        }

        function deleteUser() {
            $this->authHelper->checkLoggedIn();
            if ($_POST['user'] != 'Seleccione') {
                $userName = $_POST['user'];
                $this->model->deleteUserFromDB($userName);
                $users = $this->model->getUsers();
                $this->view->showAdminPage($users, "", "Los cambios se realizaron con exito");
            } else {
                $users = $this->model->getUsers();
                $this->view->showAdminPage($users, "", "Seleccione un usuario");
            }
        }
    }