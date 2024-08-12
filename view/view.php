<?php

require_once './templates/head.phtml';

class view{
    public function renderHome($error = null){
        require_once './templates/homeTmp.phtml';
        require_once './templates/footerTmp.phtml';
    }

    
    public function renderEquipo($user = null, $equipo = null, $puntos){
        require_once './templates/headerTmp.phtml';
        require_once './templates/equipoTmp.phtml';
        require_once './templates/footerTmp.phtml';
    }

    public function renderError($error){
        require_once './templates/headerTmp.phtml';
        require_once './templates/errorTmp.phtml';
        require_once './templates/footerTmp.phtml';
    }
    
    public function renderReglamento(){
        require_once './templates/headerTmp.phtml';
        require_once './templates/reglamentoTmp.phtml';
        require_once './templates/footerTmp.phtml';
    }
    
    public function renderAdmin($error = null, $list){
        require_once './templates/headerTmp.phtml';
        require_once './templates/adminTmp.phtml';
        require_once './templates/footerTmp.phtml';
    }
    
    public function renderNewTeam($error = null, $list){
        require_once './templates/headerTmp.phtml';
        require_once './templates/newEquipoTmp.phtml';
        require_once './templates/footerTmp.phtml';
    }

    public function renderTransferencia($error = null, $list, $team){
        require_once './templates/headerTmp.phtml';
        require_once './templates/transferenciaFormTmp.phtml';
        require_once './templates/footerTmp.phtml';
    }

    public function render404(){
        require_once './templates/headerTmp.phtml';
        require_once './templates/404.phtml';
        require_once './templates/footerTmp.phtml';
    }

    public function renderHistoria(){
        require_once './templates/headerTmp.phtml';
        require_once './templates/historiaTmp.phtml';
        require_once './templates/footerTmp.phtml';
    }
}


