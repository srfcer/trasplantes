<?php

require_once "../controlador/pacientes.controlador.php";
require_once "../modelo/pacientes.modelo.php";

//require_once "../vendor/autoload.php";


class ajaxPacientes{

public $idpersona;
public $apaterno;
public $amaterno; 
public $nombres; 
public $edad; 
public $idsexo; 
//public $idorigen;


 public function ajaxListarPacientes(){

        $pacientes=PacientesControlador::ctrListarPacientes();
        echo json_encode($pacientes);
 }

 public function ajaxRegistrarPaciente(){

        $paciente=PacientesControlador::ctrRegistrarPaciente(
        	$this->apaterno, $this->amaterno,$this->nombres,$this->edad,$this->idsexo,$this->idorigen);
        echo json_encode($paciente);
 }

 public function ajaxActualizarPaciente($data){
        
        $respuesta=PacientesControlador::ctrActualizarPaciente($data);
        echo json_encode($respuesta);

    }


}


if(isset($_POST['accion']) && ($_POST['accion']==1) ) { //parametros para listar pacientes

    $pacientes=new ajaxPacientes();
    $pacientes->ajaxListarPacientes();

}else if(isset($_POST['accion']) && $_POST['accion']==2){ //parametro para registrar pacientes

    $registrarPaciente = new AjaxPacientes();
    $registrarPaciente -> apaterno = $_POST["apaterno"];
    $registrarPaciente -> amaterno = $_POST["amaterno"];
    $registrarPaciente -> nombres = $_POST["nombres"];
    $registrarPaciente -> edad = $_POST["edad"];
    $registrarPaciente -> idsexo = $_POST["idsexo"];
    $registrarPaciente -> idorigen = $_POST["idorigen"];

    $registrarPaciente -> ajaxRegistrarPaciente(); 

}else if(isset($_POST['accion']) && $_POST['accion']==3){ //parametro para actualizar pacientes

    $actualizarPaciente = new AjaxPacientes();
        
    $data = array(
        "apaterno" => $_POST["apaterno"],
        "amaterno" => $_POST["amaterno"],
        "nombres" => $_POST["nombres"],
        "edad" => $_POST["edad"],
        "idsexo" => $_POST["idsexo"],
        "idpersona" => $_POST["idpersona"],
        "idpaciente" => $_POST["idpaciente"],
        "idorigen" => $_POST["idorigen"],
        "idgrfactor" => $_POST["idgrfactor"],
        "fechatrasplante" => $_POST["fechatrasplante"],
        "trasplante" => $_POST["trasplante"],
        "idorgano" => $_POST["idorgano"],
        "organo" => $_POST["organo"],
		"hla" => $_POST["hla"],

        ///////////////Historia///////////////
        "historia"=>$_POST['historia'],
        "antecedentes"=>$_POST['antecedentes'],
        "diagnostico"=>$_POST['diagnostico'],
        "isquemia"=>$_POST['isquemia'],

         ///////////////Hospitalizacion///////////////
         "hospitalizado"=>$_POST['hospitalizado'],
         
        ///////////////////////////////////////
        //"idgrfactor"=>$_POST['cmbGrfactor'],
        //"hla"=>$_POST['txtHla'],
        
        //////////////Donante////////////////
        "idtipodonante"=>$_POST['idtipodonante'],
        "idgrfactordonante"=>$_POST['idgrfactordonante'],
        "hladonante"=>$_POST['hladonante'],
        
        //////////////Tratamiento////////////////
        "idtratamiento"=>$_POST['idtratamiento'],
        "medicacion"=>$_POST['medicacion'],
        "tratamiento"=>$_POST['tratamiento'],
        
        //////////////Complicaciones////////////////
        "idcomplicaciontto"=>$_POST['idcomplicaciontto'],
        "intraoperatorio"=>$_POST['intraoperatorio'],
        "postoperatorio"=>$_POST['postoperatorio'],
        
        //////////////Organo////////////////
        //"idorgano"=>$_POST['idorgano'],
        //"caracteristicas"=$_POST['organo']    
    );


    $actualizarPaciente -> ajaxActualizarPaciente($data);

    
}