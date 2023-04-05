<?php

require_once "../controlador/grfactor.controlador.php";
require_once "../modelo/grfactor.modelo.php";

class AjaxGrFactor{

       
    public function ajaxListarGrFactor(){

        $grfactor = GrFactorControlador::ctrListarGrFactor();

        echo json_encode($grfactor, JSON_UNESCAPED_UNICODE);
    }

    
}

$grfactor = new AjaxGrFactor();
$grfactor->ajaxListarGrFactor();