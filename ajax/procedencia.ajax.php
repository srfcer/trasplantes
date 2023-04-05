<?php

require_once "../controlador/procedencia.controlador.php";
require_once "../modelo/procedencia.modelo.php";

class AjaxProcedencia{

           
    public function ajaxListarProcedencia(){

        $procedencia = ProcedenciaControlador::ctrListarProcedencia();

        echo json_encode($procedencia, JSON_UNESCAPED_UNICODE);
    }

    
}

$procedencia = new AjaxProcedencia();
$procedencia->ajaxListarProcedencia();