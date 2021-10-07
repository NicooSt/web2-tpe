<?php
    class CarsModel {
        private $db;

        function __construct() {
            $this->db = new PDO('mysql:host=localhost;dbname=db_cars;charset=utf8', 'root', '');
        }

        function getCarsList() {
            $request = $this->db->prepare('SELECT * FROM autos');
            $request->execute();
            return $request->fetchAll(PDO::FETCH_OBJ);
        }

        function getCar($id) {
            $request = $this->db->prepare('SELECT * FROM autos WHERE id_auto = ?');
            $request->execute(array($id));
            return $request->fetch(PDO::FETCH_OBJ);
        }
    }