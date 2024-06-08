<?php
    require_once './controller/controller.php';
    require_once './controller/authController.php';
    require_once './controller/equipoController.php';
    require_once './controller/jugadorController.php';
    require_once './controller/puntajeController.php';

    define('BASE_URL', '//'. $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF'] . '/'));
    
    $action = "home";
    
    if(!empty($_GET['action'])){
        $action = $_GET['action'];
    }
    
    $params = explode("/", $action);

    switch ($params[0]) {
        case 'home':
            $controller = new equipoController;
            $controller->showHome();
            break;
        case 'login':
            $controller = new controller;
            $controller->formLogin();
            break;
        case 'postLogin':
            $controller = new authController;
            $controller->auth();
            break;
        case 'register':
            $controller = new controller;
            $controller->formRegistro();
            break;
        case 'signUp':
            $controller = new authController;
            $controller->signUp();
            break;
        case 'logout':
            $controller = new authController;
            $controller->logout();
            break;
        case 'admin':
            $controller = new jugadorController;
            $controller->admin();
            break;
        case 'addJugador':
            $controller = new jugadorController;
            $controller->addJugador();
            break;
        case 'deletePlayer':
            $controller = new jugadorController;
            $controller->deletePlayer();
            break;
        case 'newTeam':
            $controller = new equipoController;
            $controller->newTeam();
            break;
        case 'teamCreated':
            $controller = new equipoController;
            $controller->teamCreated();
            break;
        case 'setCapitan':
            $controller = new equipoController;
            $controller->setCapitan();
            break;
        case 'transferencia':
            $controller = new equipoController;
            $controller->transferencia();
            break;
        case 'transferirJugador':
            $controller = new equipoController;
            $controller->transferir();
            break;
        case 'cargarPuntos' :
            $controller = new puntajeController;
            $controller->cargarPuntos();
            break;
        case 'cargarFecha' :
            $controller = new equipoController;
            $controller->calcularFecha();
            break;
        case 'proximamente' : 
            $controller = new equipoController;
            $controller->showHome();
            break;
        default:
            $controller = new equipoController;
            $controller->show404();
            break;
    }