<?php
    require_once 'model/CommentsModel.php';
    require_once 'view/ApiCommentsView.php';

    class ApiCommentsController {
        private $model;
        private $view;

        function __construct() {
            $this->model = new CommentsModel();
            $this->view = new ApiCommentsView();
        }

        function getComments($params = null) {
            $idCar = $params[':ID-CAR'];
            $comments = $this->model->getCommentsFromDB($idCar);
            if ($comments) {
                $this->view->response($comments, 200);
            } else {
                $this->view->response("No existen comentarios", 200);
            }
        }

        function addComment() {
            $body = $this->getBody();
            if ($body->contenido && $body->puntaje && $body->user && $body->id_auto) {
                $this->model->addCommentToDB($body->contenido, $body->puntaje, $body->user, $body->id_auto);
                $this->view->response("El comentario se inserto con exito", 200);
            } else {
                $this->view->response("Faltan completar campos", 400);
            }
        }

        function deleteComment($params = null) {
            $idComment = $params[':ID-COMMENT'];
            $comment = $this->model->getCommentFromDB($idComment);
            if ($comment) {
                $this->model->deleteCommentFromDB($idComment);
                $this->view->response("El comentario fue eliminado con exito.", 200);   
            } else {
                $this->view->response("El comentario con el id = $idComment no existe.", 200);
            }
        }
        
        private function getBody() {
            $bodyString = file_get_contents("php://input");
            return json_decode($bodyString);
        }
    }