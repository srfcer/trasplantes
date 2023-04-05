<?php


class PacientesControlador{


	static public function ctrListarPacientes(){
        $pacientes = PacientesModelo::mdlListarPacientes();
        return $pacientes;
    }


    static public function ctrRegistrarPaciente($apaterno, $amaterno,$nombres,$edad,$idsexo,$idorigen){

        $registroPaciente=PacientesModelo::mdlRegistrarPaciente($apaterno, $amaterno,$nombres,$edad,$idsexo,$idorigen);

            return $registroPaciente;

    }

   /* static public function ctrActualizarPaciente($apaterno,$amaterno,$nombres,$edad,$idsexo,$idpersona){
        $respuesta=PacientesModelo::mdlActualizarPaciente($apaterno,$amaterno,$nombres,$edad,$idsexo,$idpersona);
        return $respuesta;
    }*/

    static public function ctrActualizarPaciente($data){
        $respuesta=PacientesModelo::mdlActualizarPaciente($data);
        return $respuesta;
    }

}