<?php

class ProcedenciaControlador{

    static public function ctrListarProcedencia(){
        
        $procedencia = ProcedenciaModelo::mdlListarProcedencia();

        return $procedencia;
  
    }

}