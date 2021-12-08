<?php
    class AdminModel {
        private $db;

        function __construct() {
            $this->db = new PDO('mysql:host=localhost;dbname=db_cars;charset=utf8', 'root', '');
        }

        function getMarksList() {
            $request = $this->db->prepare('SELECT * FROM marcas');
            $request->execute();
            return $request->fetchAll(PDO::FETCH_OBJ);
        }

        function addCarToDB($modelo, $marca, $origen, $anio) {
            $requestIdMark = $this->db->prepare('SELECT id_marca FROM marcas WHERE marca = ?');
            $requestIdMark->execute(array($marca));
            $idMark = $requestIdMark->fetch(PDO::FETCH_OBJ);
            $request = $this->db->prepare('INSERT INTO autos (modelo, origen, anio, id_marca)' . 'VALUES (?, ?, ?, ?)');
            $request->execute(array($modelo, $origen, $anio, $idMark->id_marca));
        }

        function getCar($id) {
            $request = $this->db->prepare('SELECT uno.id_auto, uno.modelo, dos.marca FROM autos uno LEFT JOIN marcas dos ON uno.id_marca = dos.id_marca WHERE uno.id_auto = ?');
            $request->execute(array($id));
            return $request->fetch(PDO::FETCH_OBJ);
        }

        function getImages($id) {
            $request = $this->db->prepare('SELECT id_imagen, ruta FROM imagenes WHERE id_auto = ?');
            $request->execute(array($id));
            return $request->fetchAll(PDO::FETCH_OBJ);
        }

        function addCarImagesToDB($id, $imagesTempPaths) {
            $paths = $this->uploadImage($imagesTempPaths);
            $request = $this->db->prepare("INSERT INTO imagenes(ruta, id_auto)" . "VALUES(?, ?)");
            foreach ($paths as $path) {
                $request->execute(array($path, $id));
            }
        }

        function uploadImage($imagesTempPaths) {
            $paths = [];
            foreach ($imagesTempPaths as $imgTempPath) {
                $finalPath = 'img/cars/' . uniqid() . '.jpg';
                move_uploaded_file($imgTempPath, $finalPath);
                $paths[] = $finalPath;
            }
            return $paths;
        }

        function deleteCarImageFromDB($idImage) {
            $request = $this->db->prepare("DELETE FROM imagenes WHERE id_imagen = ?");
            $request->execute(array($idImage));
        }

        function editCarFromDB($modelo, $marca, $origen, $anio, $idCar) {
            $requestIdMark =  $this->db->prepare('SELECT id_marca FROM marcas WHERE marca = ?');
            $requestIdMark-> execute(array($marca));
            $idMark = $requestIdMark->fetch(PDO::FETCH_OBJ);
            $request = $this->db->prepare('UPDATE autos SET modelo = ?, origen = ?, anio = ?, id_marca = ? WHERE id_auto = ?');
            $request-> execute(array($modelo, $origen, $anio, $idMark->id_marca, $idCar));
        }

        function deleteCarFromDB($id) {
            $request = $this->db->prepare('DELETE FROM autos WHERE id_auto = ?');
            $request->execute(array($id));
        }

        function checkCar($id) {
            $request = $this->db->prepare("SELECT * FROM autos WHERE id_marca = ?");
            $request->execute(array($id));
            return $request->fetchAll(PDO::FETCH_OBJ);
        }

        function checkMark($marca) {
            $request = $this->db->prepare('SELECT * FROM marcas WHERE marca = ?');
            $request->execute(array($marca));
            return $request->fetch(PDO::FETCH_OBJ);
        }

        function addMarkToDB($marcaNueva, $origen, $fundacion) {
            $request = $this->db->prepare('INSERT INTO marcas (marca, origen, fundacion)' . 'VALUES (?, ?, ?)');
            $request->execute(array($marcaNueva, $origen, $fundacion));
        }

        function getMark($id) {
            $request = $this->db->prepare('SELECT marca FROM marcas WHERE id_marca = ?');
            $request->execute(array($id));
            return $request->fetch(PDO::FETCH_OBJ);
        }

        function editMarkFromDB($id, $marcaNueva, $origen, $fundacion) {
            $request = $this->db->prepare('UPDATE marcas SET marca = ?, origen = ?, fundacion = ? WHERE id_marca = ?');
            $request->execute(array( $marcaNueva, $origen, $fundacion, $id));
        }

        function deleteMarkFromDB($id) {
            $request = $this->db->prepare('DELETE FROM marcas WHERE id_marca = ?');
            $request->execute(array($id));
        }

        function getUsers() {
            $request = $this->db->prepare('SELECT * FROM users');
            $request->execute();
            return $request->fetchAll(PDO::FETCH_OBJ);
        }

        function editUser($userName, $userRol) {
            $request = $this->db->prepare('UPDATE users SET rol = ? WHERE user = ?');
            $request->execute(array($userRol, $userName));
        }

        function deleteUserFromDB($userName) {
            $request = $this->db->prepare('DELETE FROM users WHERE user = ?');
            $request->execute(array($userName));
        }
    }