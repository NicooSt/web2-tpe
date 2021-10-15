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

        function getCar($id){
            $request = $this->db->prepare('SELECT uno.modelo, dos.marca FROM autos uno LEFT JOIN marcas dos ON uno.id_marca = dos.id_marca WHERE uno.id_auto = ?');
            $request->execute(array($id));
            return $request->fetch(PDO::FETCH_OBJ);
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

        function editMarkFromDB($id, $marcaNueva, $origen, $fundacion){
            $request = $this->db->prepare('UPDATE marcas SET marca = ?, origen = ?, fundacion = ? WHERE id_marca = ?');
            $request->execute(array( $marcaNueva, $origen, $fundacion, $id));
        }

        function deleteMarkFromDB($id) {
            $request = $this->db->prepare('DELETE FROM marcas WHERE id_marca = ?');
            $request->execute(array($id));
        }
    }