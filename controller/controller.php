<?php

require_once 'userModel.php';
require_once 'view.php';
require_once 'modelJugadores.php';

class controller{

    private $model;
    private $modelJugadores;
    private $view;

    public function __construct(){
        $this->model = new userModel;
        $this->modelJugadores = new modelJugadores;
        $this->view = new view;
    }

    public function formLogin(){
        $this->view->renderLogin();
    }

    public function formRegistro(){
        $this->view->renderRegister();
    }


}