<?php

require_once './model/userModel.php';
require_once './view/view.php';
require_once './model/modelJugadores.php';

class controller{

    private $model;
    private $modelJugadores;
    private $view;

    public function __construct(){
        $this->model = new userModel;
        $this->modelJugadores = new modelJugadores;
        $this->view = new view;
    }

    public function showHistoria(){
        $this->view->renderHistoria();
    }

    public function showReglamento(){
        $this->view->renderReglamento();
    }

}