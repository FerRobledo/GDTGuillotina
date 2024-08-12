<?php

require_once './model/modelJugadores.php';
require_once './view/view.php';

class jugadorController{

    private $model;
    private $view;

    public function __construct(){
        $this->model = new modelJugadores;
        $this->view = new view;
    }

    public function admin(){
        if(authHelper::isAuthenticated()){
            if($_SESSION['USER_ID']== 1){
                $listaJugadores = $this->model->getAll();
                $this->view->renderAdmin(null, $listaJugadores);
            } else{
                header('Location: ' . BASE_URL . '/home');
            }
        }
    }

    public function addJugador(){
        if(empty($_POST['nombre'] || empty($_POST['apellido'])  || empty($_POST['numero']) || empty($_POST['posicion']))){
            $this->view->renderAdmin("Faltan datos", null);
            return;
        }
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $numero = $_POST['numero'];
        $posicion = $_POST['posicion'];

        $id = $this->model->newJugador($nombre, $apellido, $numero, $posicion);

        if($id){
            header('Location: ' . BASE_URL . '/admin');
        } else {
            $this->view->renderAdmin('Error desconocido.');
        }
    }

    public function deletePlayer(){
        if(empty($_GET['id'])){
            $this->view->renderAdmin("Error");
            return;
        }
        $id = $_GET['id'];
        $this->model->deletePlayer($id);
        header('Location: ' . BASE_URL . '/admin');
    }
}