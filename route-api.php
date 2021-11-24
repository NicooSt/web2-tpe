<?php
    require_once 'libs/router/Router.php';
    require_once 'controller/ApiCommentsController.php';

    $router = new Router();
    $router->addRoute('comments/:ID-CAR', 'GET', 'ApiCommentsController', 'getComments');
    $router->addRoute('comments', 'POST', 'ApiCommentsController', 'addComment');
    $router->addRoute('comments/:ID-COMMENT', 'DELETE', 'ApiCommentsController', 'deleteComment');
    $router->route($_GET['resource'], $_SERVER['REQUEST_METHOD']);