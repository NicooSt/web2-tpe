<?php
    class CarsModel {
        private $db;

        function __construct() {
            $this->db = new PDO('mysql:host=localhost;dbname=db_cars;charset=utf8', 'root', '');
        }

        function getCarsList() {
            $request = $this->db->prepare('SELECT a.id_auto, a.modelo, a.origen, a.anio, b.marca FROM autos a LEFT JOIN marcas b ON a.id_marca = b.id_marca');
            $request->execute();
            return $request->fetchAll(PDO::FETCH_OBJ);
        }

        function getCar($id) {
            $request = $this->db->prepare('SELECT a.id_auto, a.modelo, a.origen, a.anio, b.marca FROM autos a LEFT JOIN marcas b ON a.id_marca = b.id_marca WHERE a.id_auto = ?');
            $request->execute(array($id));
            return $request->fetch(PDO::FETCH_OBJ);
        }

        function getCarImages($id) {
            $request = $this->db->prepare('SELECT * FROM imagenes WHERE id_auto = ?');
            $request->execute(array($id));
            return $request->fetchAll(PDO::FETCH_OBJ);
        }
        
        function getMarksList() {
            $request = $this->db->prepare('SELECT * FROM marcas');
            $request->execute();
            return $request->fetchAll(PDO::FETCH_OBJ);
        }

        function getByMark($mark) {          
            $request = $this->db->prepare('SELECT a.id_auto, a.modelo, a.origen, a.anio, b.marca FROM autos a LEFT JOIN marcas b ON a.id_marca = b.id_marca WHERE b.marca = ?');
            $request->execute(array($mark));
            return $request->fetchAll(PDO::FETCH_OBJ);
        }
    }