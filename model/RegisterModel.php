<?php
    class RegisterModel {
        private $db;

        function __construct() {
            $this->db = new PDO('mysql:host=localhost;dbname=db_cars;charset=utf8', 'root', '');    
        }

        function checkUser($user) {
            $request = $this->db->prepare('SELECT * FROM users WHERE user = ?');
            $request->execute(array($user));
            return $request->fetch(PDO::FETCH_OBJ);
        }

        function addUser($user, $password, $rol) {
            $request = $this->db->prepare('INSERT INTO users(user, password, rol)' . 'VALUES(?, ?, ?)');
            $request->execute(array($user, $password, $rol));
        }
    }