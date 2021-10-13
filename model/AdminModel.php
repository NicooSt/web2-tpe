<?php
    class AdminModel {
        private $db;

        function __construct() {
            $this->db = new PDO('mysql:host=localhost;dbname=db_cars;charset=utf8', 'root', '');
        }

        // function getCarsList() {
        //     $request = $this->db->prepare('SELECT * FROM autos');
        //     $request->execute();
        //     return $request->fetchAll(PDO::FETCH_OBJ);
        // }

        // function getMarksList() {
        //     $request = $this->db->prepare('SELECT * FROM marcas');
        //     $request->execute();
        //     return $request->fetchAll(PDO::FETCH_OBJ);
        // }

        function checkCar($modelo) {
            $request = $this->db->prepare('SELECT * FROM autos WHERE modelo = ?');
            $request->execute(array($modelo));
            return $request->fetch(PDO::FETCH_OBJ);
        }

        function addCarToDB($modelo, $origen, $anio, $marca) {
            $requestIdMark = $this->db->prepare('SELECT id_marca FROM marcas WHERE marca = ?');
            $requestIdMark->execute(array($marca));
            $idMark = $requestIdMark->fetch(PDO::FETCH_OBJ);
            $request = $this->db->prepare('INSERT INTO autos (modelo, origen, anio, id_marca)' . 'VALUES (?, ?, ?, ?)');
            $request->execute(array($modelo, $origen, $anio, $idMark->id_marca));
        }

        function editCarFromDB($modelo, $modeloNuevo, $origen, $anio, $marca) {
            // Consigo el id del auto que coincide con el modelo
            $requestIdCar = $this->db->prepare('SELECT id_auto FROM autos WHERE modelo = ?');
            $requestIdCar->execute(array($modelo));
            $idCar = $requestIdCar->fetch(PDO::FETCH_OBJ);
            // Consigo el id de la marca nueva
            $requestIdMark = $this->db->prepare('SELECT id_marca FROM marcas WHERE marca = ?');
            $requestIdMark->execute(array($marca));
            $idMark = $requestIdMark->fetch(PDO::FETCH_OBJ);
            // Edito el auto correspondiente con la info obtenida
            $request = $this->db->prepare('UPDATE autos SET modelo = ?, origen = ?, anio = ?, id_marca = ? WHERE autos.id_auto = ?');
            $request->execute(array($modeloNuevo, $origen, $anio, $idMark->id_marca, $idCar->id_auto));
        }

        function deleteCarFromDB($id) {
            $request = $this->db->prepare('DELETE FROM autos WHERE id_auto = ?');
            $request->execute(array($id));
        }

        function checkMark($marca) {
            $request = $this->db->prepare('SELECT * FROM marcas WHERE marca = ?');
            $request->execute(array($marca));
            return $request->fetch(PDO::FETCH_OBJ);
        }

        function addMarkToDB($marca, $origen, $fundacion) {
            $request = $this->db->prepare('INSERT INTO marcas (marca, origen, fundacion)' . 'VALUES (?, ?, ?)');
            $request->execute(array($marca, $origen, $fundacion));
        }

        function editMarkFromDB($marca, $marcaNueva, $origen, $fundacion) {
            // Consigo id de la marca que coincide con la marca anterior
            $requestIdMark = $this->db->prepare('SELECT id_marca FROM marcas WHERE marca = ?');
            $requestIdMark->execute(array($marca));
            $idMark = $requestIdMark->fetch(PDO::FETCH_OBJ);
            // Edito la marca con los nuevos datos
            $request = $this->db->prepare('UPDATE marcas SET marca = ?, origen = ?, fundacion = ? WHERE marcas.id_marca = ?');
            $request->execute(array($marcaNueva, $origen, $fundacion, $idMark->id_marca));
        }

        function deleteMarkFromDB($id) {
            $request = $this->db->prepare('DELETE FROM marcas WHERE id_marca = ?');
            $request->execute(array($id));
        }
    }