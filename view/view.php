<?php
require './templates/head.phtml';

class view{

    public function renderHome($user = null, $equipo = null, $puntos, $error = null){
        require_once './templates/homeTmp.phtml';
    }

    public function renderError($error){
        require_once './templates/headerTmp.phtml';
        require_once './templates/errorTmp.phtml';
    }

    public function renderRegister($error = null){
        require_once './templates/headerTmp.phtml';
        require_once './templates/registerTmp.phtml';
    }

    public function renderAdmin($error = null, $list){
        require_once './templates/headerTmp.phtml';
        require_once './templates/adminTmp.phtml';
    }

    public function renderNewTeam($error = null, $list){
        require_once './templates/headerTmp.phtml';
        require_once './templates/newEquipoTmp.phtml';
    }

    public function renderTransferencia($error = null, $list, $team){
        require_once './templates/headerTmp.phtml';
        require_once './templates/transferenciaFormTmp.phtml';
    }

    public function render404(){
        require_once './templates/headerTmp.phtml';
        require_once './templates/404.phtml';
    }
}