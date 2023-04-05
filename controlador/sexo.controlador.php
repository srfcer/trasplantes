<?php

class SexoControlador{

    static public function ctrListarSexo(){
        
        $sexo = SexoModelo::mdlListarSexo();

        return $sexo;
  
    }

}