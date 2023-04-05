<?php

class TipoDonanteControlador{

    static public function ctrListarTipoDonante(){
        
        $tipodonante = TipoDonanteModelo::mdlListarTipoDonante();

        return $tipodonante;
  
    }

}