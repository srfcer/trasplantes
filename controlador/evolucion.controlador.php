<?php

class EvolucionControlador{

    static public function ctrListarEvolucion($idevolucion){
        
        $evolucion = EvolucionModelo::mdlListarEvolucion($idevolucion);

        return $evolucion;
  
    }

    static public function ctrRegistrarEvolucion($fecha,$evolucion,$idevotto){

        $registroEvolucion=EvolucionModelo::mdlRegistrarEvolucion($fecha,$evolucion,$idevotto);

            return $registroEvolucion;

        }

        static public function ctrActualizarEvolucion($fecha,$evolucion,$idevolucion){

            $actualizarEvolucion=EvolucionModelo::mdlActualizarEvolucion($fecha,$evolucion,$idevolucion);
    
            return $actualizarEvolucion;
    
        }

}