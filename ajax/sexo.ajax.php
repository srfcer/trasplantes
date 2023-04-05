<?php

require_once "../controlador/sexo.controlador.php";
require_once "../modelo/sexo.modelo.php";

class AjaxSexo{

    public $idCategoria;
    public $categoria;
    public $medida;
       
    public function ajaxListarSexo(){

        $sexo = SexoControlador::ctrListarSexo();

        echo json_encode($sexo, JSON_UNESCAPED_UNICODE);
    }

    
}

$sexo = new AjaxSexo();
$sexo->ajaxListarSexo();