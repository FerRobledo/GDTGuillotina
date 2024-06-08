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
        $this->config = new config();
    }

    public function showHome(){
        
        $torneo = isset($_GET['t']) ? $_GET['t'] : 1;

        if($torneo == 1){
            $puntos = $this->modelEquipo->getAllInfoPts();
        } else{
            $puntos = $this->modelEquipo->getAllInfoPtsTotal();
        }

        if(authHelper::isAuthenticated()){
            $modelJugadores = new modelJugadores;
            $user = $this->model->getByUsername($_SESSION['USERNAME']);
            $equipo = $this->modelEquipo->getAllTeamByUserId($user->id);
            if($equipo){
                $this->view->renderHome($user, $equipo, $puntos);
            }else{
                $this->view->renderHome($user, null, $puntos);
            }
        } else{
            $this->view->renderHome(null , null, $puntos);
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
            
            if(!$this->cumpleReglas($arr)){
                $this->view->renderNewTeam("El equipo no cumple con las reglas, revisar los anuncios guillotenses.", $modelJugadores->getAll());
                return;
            }

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

    private function cumpleReglas($arr){
        $modelJugadores = new modelJugadores;
        $del = 0; $def = 0; $med = 0;
        foreach($arr as $id){
            $jugador = $modelJugadores->getById($id);
            switch ($jugador->posicion) {
                case 'del':
                    $del++;
                    break;
                case 'med':
                    $med++;
                    break;
                case 'def':
                    $def++;
                    break;
                default:
                    break;
            }
        }
        if(($del > 2 || $def > 3 || $med > 2) || ($del == 0 || $med == 0 || $def == 0)){
            return false;
        }
        return true;
    }

    public function calcularFecha(){
        $equipos = $this->modelEquipo->getAll();
        $modelPuntaje = new modelPuntaje;
        $modelJugadores = new modelJugadores;
        foreach($equipos as $equipo){
            $jugadores = $this->modelEquipo->getAllTeamByUserId($equipo->usuario_id);
            $sumaPuntos = 0;
            foreach($jugadores as $jugador){
                $valoracion = $modelPuntaje->getValoracionById($jugador->jugador_id);
                if($valoracion){
                    if($jugador->es_capitan){
                        $sumaPuntos += $jugador->puntos + $valoracion->valoracion;
                    } else {
                        $sumaPuntos += $jugador->puntos;
                    }
                }
            }
            $this->modelEquipo->actualizarPuntos($equipo->nombre, $sumaPuntos);
        }
        $modelJugadores->set0Pts();
        $this->model->darCambios();
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
    
    private function transfCumpleRegla($team, $destino, $origen){
        $modelJugadores = new modelJugadores;
        $del = 0; $def = 0; $med = 0;

        $origen = $modelJugadores->getById($origen);
        $destino = $modelJugadores->getById($destino);
        $arr = [$team[0]->posicion, $team[1]->posicion, $team[2]->posicion, $team[3]->posicion, $team[4]->posicion, $destino];

        foreach($arr as $jugador){
            switch ($jugador) {
                case 'del':
                    $del++;
                    break;
                case 'med':
                    $med++;
                    break;
                case 'def':
                    $def++;
                    break;
                default:
                    break;
            }
        }

        switch ($origen->posicion) {
            case 'del':
                $del--;
                break;
            case 'med':
                $med--;
                break;
            case 'def':
                $def--;
                break;
            default:
                break;
        }

        if(($del > 2 || $def > 3 || $med > 2 || $del == 0 || $med == 0 || $def == 0)){
          return false;
        }

        return true;
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
                
                if(!$this->transfCumpleRegla($team, $destino, $origen)){
                    $this->view->renderTransferencia("El cambio no cumple con las reglas.", $list, $team);
                }

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

}