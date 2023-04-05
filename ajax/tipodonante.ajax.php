<?php

require_once "../controlador/tipodonante.controlador.php";
require_once "../modelo/tipodonante.modelo.php";

class AjaxTipoDonante{

       
    public function ajaxListarTipoDonante(){

        $tipodonante = TipoDonanteControlador::ctrListarTipoDonante();

        echo json_encode($tipodonante, JSON_UNESCAPED_UNICODE);
    }

    
}

$tipodonante = new AjaxTipoDonante();
$tipodonante->ajaxListarTipoDonante();