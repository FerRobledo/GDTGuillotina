<?php

require_once 'config.php';
require_once './helper/authHelper.php';
require_once './model/userModel.php';
require_once './model/modelJugadores.php';
require_once './model/modelEquipo.php';
require_once './view/view.php';
require_once './model/modelPuntaje.php';

class equipoController{
    private $model;
    private $view;
    private $modelEquipo;
    private $config;

    public function __construct(){
        $this->model = new userModel;
        $this->modelEquipo = new modelEquipo;
        $this->view = new view;
    }

    public function showHome(){
        
        $torneo = isset($_GET['t']) ? $_GET['t'] : 1;

        if($torneo == 1){
            $puntos = $this->modelEquipo->getAllInfoPts();
        } else{
            $puntos = $this->modelEquipo->getAllInfoPtsTotal();
        }

        if(authHelper::isAuthenticated()){
            $modelPuntaje = new modelPuntaje;
            $user = $this->model->getByUsername($_SESSION['USERNAME']);
            $equipo = $this->modelEquipo->getAllTeamByUserId($user->id);
            if($equipo){
                foreach ($equipo as $jugador) {
                    $pts = $modelPuntaje->getPuntajeIdJugador($jugador->jugador_id);
                    $jugador->puntos = $this->calcularPuntos($jugador, $pts);
                }
                $this->view->renderEquipo($user, $equipo, $puntos);
            }else{
                $this->view->renderEquipo($user, null, $puntos);
            }
        } else{
            $this->view->renderHome();
        }
    }

    public function show404(){ 
        $this->view->render404();
    }

    public function newTeam(){
        $modelJugadores = new modelJugadores;
        $list = $modelJugadores->getAll();
        $this->view->renderNewTeam(null, $list);
    }

    public function teamCreated(){
        if(authHelper::isAuthenticated()){
            if(empty($_POST['nombre_equipo']) || empty($_POST['capitan']) || empty($_POST['jugador2']) || empty($_POST['jugador3']) || empty($_POST['jugador4']) || empty($_POST['jugador5'])){
                $this->view->renderNewTeam("Faltan jugadores.", $modelJugadores->getAll());
            }
            $modelJugadores = new modelJugadores;
            $nombre = $_POST['nombre_equipo'];
            $capitan = $_POST['capitan'];
            $jugador2 = $_POST['jugador2'];
            $jugador3 = $_POST['jugador3'];
            $jugador4 = $_POST['jugador4'];
            $jugador5 = $_POST['jugador5'];
            $arr = [$capitan, $jugador2, $jugador3, $jugador4, $jugador5];

            $equipo = $this->modelEquipo->getEquipoByName($nombre);
            if($equipo){
                $this->view->renderNewTeam("Nombre de equipo repetido!", $modelJugadores->getAll());
                return;
            }
            if(!$this->tieneRepetidos($arr)){
                $id = $this->modelEquipo->newTeam($nombre, $_SESSION['USER_ID'], $capitan, $jugador2, $jugador3, $jugador4, $jugador5);
                header('Location: ' . BASE_URL . '');   
            } else {
                $this->view->renderNewTeam("Jugadores repetidos", $modelJugadores->getAll());
                return;
            }

            if($id){
                header('Location: ' . BASE_URL . '/newTeam');
            } else {
                $this->view->renderNewTeam('Error desconocido.', $modelJugadores->getAll());
            }
        }
    }

    public function calcularFecha(){
        $equipos = $this->modelEquipo->getAll();
        $modelPuntaje = new modelPuntaje;
        $modelJugadores = new modelJugadores;
        foreach($equipos as $equipo){
            $sumaPuntos = 0;
            $jugadores = $this->modelEquipo->getAllTeamByUserId($equipo->usuario_id);
            foreach($jugadores as $jugador){
                $pts = $modelPuntaje->getPuntajeIdJugador($jugador->jugador_id);
                $valoracion = $modelPuntaje->getValoracionById($jugador->jugador_id);
                if($valoracion){
                    $sumaPuntos += $this->calcularPuntos($jugador, $pts);
                }
            }
            $this->modelEquipo->actualizarPuntos($equipo->nombre, $sumaPuntos);
        }
        $modelJugadores->set0Pts();
        //$this->model->darCambios();
        header('Location:' . BASE_URL . '');
    }

    public function setCapitan(){
        if(authHelper::isAuthenticated()){
            if(empty($_GET['jugador_id'])){
                $this->view->renderError("Error desconocido.");
            }

            $id = $_GET['jugador_id'];
            $equipo = $this->modelEquipo->getTeamByUserId($_SESSION['USER_ID']);

            $this->modelEquipo->deleteCapitan($equipo);
            $this->modelEquipo->setCapitan($equipo, $id);

            header('Location: ' . BASE_URL . '');
        }
    }

    function transferencia(){
        if(authHelper::isAuthenticated()){
            $modelJugadores = new modelJugadores;
            $list = $modelJugadores->getAll();
            $team = $this->modelEquipo->getAllTeamByUserId($_SESSION['USER_ID']);
            $this->view->renderTransferencia(null, $list, $team);
        }
    }

    function transferir(){
        if(authHelper::isAuthenticated()){
            $user = $this->model->getByUsername($_SESSION['USERNAME']);
            $modelJugadores = new modelJugadores;
            $list = $modelJugadores->getAll();
            $team = $this->modelEquipo->getAllTeamByUserId($_SESSION['USER_ID']);
            if($user->hizoCambio == 0){
                
                if(empty($_POST['jugador_origen']) || empty($_POST['jugador_destino'])){
                    $this->view->renderTransferencia("Falta seleccionar jugadores.", $list, $team);
                }
    
                $origen = $_POST['jugador_origen'];
                $destino = $_POST['jugador_destino'];
                

                $jugador_en_equipo = $this->modelEquipo->checkPlayerInTeam($team[0]->nombre, $destino);
                if($jugador_en_equipo) {
                    $this->view->renderTransferencia("El jugador destino ya está en el equipo.", $list, $team);
                    return; // Detener la ejecución del método si el jugador destino ya está en el equipo
                }
                
                $this->modelEquipo->transferir($team[0]->nombre, $origen, $destino);
                $this->model->hizocambio($_SESSION['USER_ID']);

                header('Location: ' . BASE_URL . '');
            } else{
                $this->view->renderTransferencia("No tenes cambios disponibles", $list, $team);
            }
        }
    }

    function tieneRepetidos($array) {
        $conteo = array_count_values($array);
        foreach ($conteo as $valor => $cantidad) {
            if ($cantidad > 1) {
                return true; // Si hay un valor repetido, retorna true
            }
        }
        return false; // Si no hay valores repetidos, retorna false
    }


    private function calcularPuntos($jugador, $puntos){
        $sumaPuntos = 0;
        if($puntos){

            switch ($jugador->posicion) {
                case 'arq':
                    $sumaPuntos += $puntos->valoracion;
                    $sumaPuntos += $puntos->figura*4;
                    $sumaPuntos += $puntos->valla_invicta*3;
                    $sumaPuntos += $puntos->gol_recibido*-1;
                    $sumaPuntos += $puntos->gol_oro*5;
                    $sumaPuntos += $puntos->tarjeta_amarilla*-2;
                    $sumaPuntos += $puntos->tarjeta_roja*-2;
                    $sumaPuntos += $puntos->gol*12;
                    $sumaPuntos += $puntos->penal_errado*-4;
                    $sumaPuntos += $puntos->penal_atajado*4;
                    $sumaPuntos += $puntos->gol_penal*3;
                    $sumaPuntos += $puntos->gol_contra*-2;
                    $sumaPuntos += $puntos->correccion;
                    break;
                    case 'def' :
                        $sumaPuntos += $puntos->valoracion;
                        $sumaPuntos += $puntos->figura*4;
                $sumaPuntos += $puntos->valla_invicta*2;
                $sumaPuntos += $puntos->gol_recibido*0;
                $sumaPuntos += $puntos->gol_oro*5;
                $sumaPuntos += $puntos->tarjeta_amarilla*-2;
                $sumaPuntos += $puntos->tarjeta_roja*-2;
                $sumaPuntos += $puntos->gol*9;
                $sumaPuntos += $puntos->penal_errado*-4;
                $sumaPuntos += $puntos->penal_atajado*4;
                $sumaPuntos += $puntos->gol_penal*3;
                $sumaPuntos += $puntos->gol_contra*-2;
                $sumaPuntos += $puntos->correccion;
                break;
            case 'med' :
                $sumaPuntos += $puntos->valoracion;
                $sumaPuntos += $puntos->figura*4;
                $sumaPuntos += $puntos->valla_invicta*0;
                $sumaPuntos += $puntos->gol_recibido*0;
                $sumaPuntos += $puntos->gol_oro*5;
                $sumaPuntos += $puntos->tarjeta_amarilla*-2;
                $sumaPuntos += $puntos->tarjeta_roja*-2;
                $sumaPuntos += $puntos->gol*6;
                $sumaPuntos += $puntos->penal_errado*-4;
                $sumaPuntos += $puntos->penal_atajado*4;
                $sumaPuntos += $puntos->gol_penal*3;
                $sumaPuntos += $puntos->gol_contra*-2;
                $sumaPuntos += $puntos->correccion;
                break;
                case 'del' :
                    $sumaPuntos += $puntos->valoracion;
                    $sumaPuntos += $puntos->figura*4;
                    $sumaPuntos += $puntos->valla_invicta*0;
                    $sumaPuntos += $puntos->gol_recibido*0;
                    $sumaPuntos += $puntos->gol_oro*5;
                    $sumaPuntos += $puntos->tarjeta_amarilla*-2;
                    $sumaPuntos += $puntos->tarjeta_roja*-2;
                    $sumaPuntos += $puntos->gol*4;
                    $sumaPuntos += $puntos->penal_errado*-4;
                    $sumaPuntos += $puntos->penal_atajado*4;
                    $sumaPuntos += $puntos->gol_penal*3;
                    $sumaPuntos += $puntos->gol_contra*-2;
                    $sumaPuntos += $puntos->correccion;
                    break;
                }
            }
        if($puntos && $jugador->es_capitan){
            $sumaPuntos += $puntos->valoracion;
        }
        return $sumaPuntos;
    }
}