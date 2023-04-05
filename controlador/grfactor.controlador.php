<?php

class GrFactorControlador{

    static public function ctrListarGrFactor(){
        
        $grfactor = GrFactorModelo::mdlListarGrFactor();

        return $grfactor;
  
    }

}