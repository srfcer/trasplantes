<?php

require_once "../controlador/evolucion.controlador.php";
require_once "../modelo/evolucion.modelo.php";

class AjaxEvolucion{
       
    public function ajaxListarEvolucion(){

        $listarevolucion = EvolucionControlador::ctrListarEvolucion($this->idevolucion);

        echo json_encode($listarevolucion, JSON_UNESCAPED_UNICODE);
    }

    public function ajaxRegistrarEvolucion(){

        $evolucion=EvolucionControlador::ctrRegistrarEvolucion($this->fecha,$this->evolucion,$this->idevotto);
        echo json_encode($evolucion);
    }

    public function ajaxActualizarEvolucion(){

        $respuesta  =EvolucionControlador::ctrActualizarEvolucion($this->fecha,$this->evolucion,$this->idevolucion);
        echo json_encode($respuesta);
    }

    
}


if(isset($_POST['accion_e']) && ($_POST['accion_e']==1) ) { //parametros para listar la evolucion con idevotto

    $evolucion=new AjaxEvolucion();
    $evolucion -> idevolucion = $_POST["idevolucion"];
    $evolucion->ajaxListarEvolucion();

}else if(isset($_POST['accion_e']) && $_POST['accion_e']==2){ //parametro para registrar la evolucion

    $registrarEvolucion = new AjaxEvolucion();
    $registrarEvolucion -> fecha = $_POST["fecha"];
    $registrarEvolucion -> evolucion = $_POST["evolucion"];
    $registrarEvolucion -> idevotto = $_POST["idevotto"];
    
    $registrarEvolucion -> ajaxRegistrarEvolucion(); 

}else if(isset($_POST['accion_e']) && $_POST['accion_e']==3){ //parametro para Actualizar la evolucion

    $actualizarEvolucion = new AjaxEvolucion();

    $actualizarEvolucion -> fecha = $_POST["fecha"];
    $actualizarEvolucion -> evolucion = $_POST["evolucion"];
    $actualizarEvolucion -> idevolucion = $_POST["idevolucion"];
    $actualizarEvolucion -> ajaxActualizarEvolucion(); 

}