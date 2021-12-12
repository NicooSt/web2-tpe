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

        function getCarsPerPage($actualPage, $value) {
            $filas = 5;
            $iniciar = ($actualPage - 1) * $filas;
            if ($value == "cars") {
                // // Si $value es "cars" el parametro viene de la funcion showCars
                $request = $this->db->prepare("SELECT a.*, b.marca FROM autos a LEFT JOIN marcas b ON a.id_marca = b.id_marca LIMIT :iniciar, :filas");
                $request->bindParam(':iniciar', $iniciar, PDO::PARAM_INT);
                $request->bindParam(':filas', $filas, PDO::PARAM_INT);
                $request->execute();
                return $request->fetchAll(PDO::FETCH_OBJ);
            } else {
                // Si $value no es "cars" es la marca indicada en el filtro
                $request = $this->db->prepare("SELECT a.*, b.marca FROM autos a LEFT JOIN marcas b ON a.id_marca = b.id_marca WHERE b.marca = ? LIMIT $iniciar, $filas");
                $request->execute(array($value));
                return $request->fetchAll(PDO::FETCH_OBJ);
            }
        }

        function getNumOfPages($value) {
            if ($value == "cars") {
                // Si $value es "cars" el parametro viene de la funcion showCars o filtro "todos"
                $request = $this->db->prepare("SELECT * FROM autos");
                $request->execute();
                $result = $request->fetchAll(PDO::FETCH_OBJ);

                $total = count($result);
                $pages = $total / 5;
                return $pages = ceil($pages);
            } else {
                // Si $value no es "cars" es la marca indicada en el filtro
                $request = $this->db->prepare("SELECT a.* FROM autos a LEFT JOIN marcas b ON a.id_marca = b.id_marca WHERE b.marca = ?");
                $request->execute(array($value));
                $result = $request->fetchAll(PDO::FETCH_OBJ);
                
                $total = count($result);
                $pages = $total / 5;
                return $pages = ceil($pages);
            }
        }
    }