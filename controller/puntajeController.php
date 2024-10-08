<?php
    require_once './view/view.php';
    require_once './model/modelJugadores.php';
    require_once './model/modelPuntaje.php';
    class puntajeController{

        private $view;
        private $modelJugadores;
        private $modelPuntaje;

        public function __construct(){
            $this->view = new view;
            $this->modelJugadores = new modelJugadores;
            $this->modelPuntaje = new modelPuntaje;
        }

        public function cargarPuntos(){
            $tor = $_POST['torneo'];
            $fec = $_POST['fecha'];
            $idj = $_POST['id_jugador'];
            $val = $_POST['valoracion'];
            $fig = $_POST['figura'];
            $vallainv = $_POST['valla_invicta'];
            $golrecib = $_POST['gol_recibido'];
            $goloro = $_POST['gol_oro'];
            $taram = $_POST['tarjeta_amarilla'];
            $tarro = $_POST['tarjeta_roja'];
            $gol = $_POST['gol'];
            $penaler = $_POST['penal_errado'];
            $penalat = $_POST['penal_atajado'];
            $golpen = $_POST['gol_penal'];
            $golcon = $_POST['gol_contra'];
            $correc = $_POST['correccion'];
            
            $idPuntos = $this->modelPuntaje->cargarPuntos($idj, $tor, $fec, $val, $fig, $vallainv, $golrecib, $goloro, $taram, $tarro, $gol, $penaler, $penalat, $golpen, $golcon, $correc);
            $puntos = $this->modelPuntaje->getById($idPuntos);
            $this->actualizarPts($idj, $puntos);
            
            header('Location: ' . BASE_URL . '/admin');
        }

        private function actualizarPts($idj, $puntos){
            $jugador = $this->modelJugadores->getById($idj);
            $sumaPuntos = 0;
            
            switch ($jugador->posicion) {
                case 'arq':
                    $sumaPuntos += $puntos->valoracion;
                    $sumaPuntos += $puntos->figura*4;
                    $sumaPuntos += $puntos->valla_invicta*3;
                    $sumaPuntos += $puntos->gol_recibido*-1;
                    $sumaPuntos += $puntos->gol_oro*5;
                    $sumaPuntos += $puntos->tarjeta_amarilla*-2;
                    $sumaPuntos += $puntos->tarjeta_roja*-4;
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
                    $sumaPuntos += $puntos->tarjeta_roja*-4;
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
                    $sumaPuntos += $puntos->tarjeta_roja*-4;
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
                    $sumaPuntos += $puntos->tarjeta_roja*-4;
                    $sumaPuntos += $puntos->gol*4;
                    $sumaPuntos += $puntos->penal_errado*-4;
                    $sumaPuntos += $puntos->penal_atajado*4;
                    $sumaPuntos += $puntos->gol_penal*3;
                    $sumaPuntos += $puntos->gol_contra*-2;
                    $sumaPuntos += $puntos->correccion;
                break;
            }
            $this->modelJugadores->actualizarPts($idj, $sumaPuntos);
        }
    }