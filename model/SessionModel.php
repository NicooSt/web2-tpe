<?php
    class SessionModel{
        private $db;

        function __construct() {
            $this->db = new PDO('mysql:host=localhost;dbname=db_cars;charset=utf8', 'root', ''); 
        }

        function getUser($user) {
            $request = $this->db->prepare('SELECT * FROM users WHERE user = ?');
            $request->execute(array($user));
            return $request->fetch(PDO::FETCH_OBJ);
        }
    }