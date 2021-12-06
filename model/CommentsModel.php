<?php
    class CommentsModel {
        private $db;

        function __construct() {
            $this->db = new PDO('mysql:host=localhost;dbname=db_cars;charset=utf8', 'root', '');
        }

        function getCommentsFromDB($idCar) {
            $request = $this->db->prepare('SELECT * FROM comentarios WHERE id_auto = ?');
            $request->execute(array($idCar));
            return $request->fetchAll(PDO::FETCH_OBJ);
        }

        function addCommentToDB($content, $date, $score, $user, $idCar) {
            $request = $this->db->prepare('INSERT INTO comentarios(contenido, fecha, puntaje, user, id_auto)' . 'VALUES(?, ?, ?, ?, ?)');
            $request->execute(array($content, $date, $score, $user, $idCar));
        }

        function getCommentFromDB($idComment) {
            $request = $this->db->prepare('SELECT * FROM comentarios WHERE id_comentario = ?');
            $request->execute(array($idComment));
            return $request->fetch(PDO::FETCH_OBJ);
        }

        function deleteCommentFromDB($idComment) {
            $request = $this->db->prepare('DELETE FROM comentarios WHERE id_comentario = ?');
            $request->execute(array($idComment));
        }
    }