<?php
session_start();
include_once 'Modelo/modelo.php';

class controlador{

    public $MODEL;

    //////tblpaciente////
    public $idpaciente;
    public $apaterno;
    public $amaterno;
    public $nombres;
    public $edad;
    public $idsexo;
    public $idorigen;
    /////////////////////
   
            
    public function __construct(){
        $this->MODEL = new modelo(); 
    }
  
    public function index(){
        include_once('Vista/login.php');
    }

    public function ir(){
        $pagina = $_REQUEST['tipo'];
        include_once 'Vista/'.$pagina.'.php';
    }

    public function validar(){
        $hola = new modelo();
        $hola->usuario=$_POST['txtUsuario'];
        $hola->clave=$_POST['txtPassword'];

        $valor = $this->MODEL->validarUser($hola);
        if ($valor->conta != 0){
            $valor = $this->MODEL->validarPass($hola);
            if ($valor->conta != 0){
                $valor = $this->MODEL->validarUsuario($hola);
                if ($valor->conta != 0){
                    $valor = $this->MODEL->cargarUsuario($hola);

                        switch ($valor->tipo){
                            case "Administrador":
                                header("Location: index.php?c=ir&tipo=admin");
                                break;
                            case "Asistente":
                                header("Location: index.php?c=ir&tipo=inicio");
                                break;
                            }
                    $_SESSION['nombres']=$valor->nombres;
                    $_SESSION['apaterno']=$valor->apaterno;
                    $_SESSION['amaterno']=$valor->amaterno;
                    $_SESSION['rol']=$valor->tipo;
                    $_SESSION['acceso']=1;
                    
                }else{
                        $msgP="Sus Datos no coinciden";
                        include_once('Vista/login.php');
                    }
            }else{
                $msgP="Cotraseña incorrecta";
                include_once('Vista/login.php');
            }
        }else{
            $msgU="Este usuario no existe";
            include_once('Vista/login.php');
        }
    }

    public function nuevo(){
        include_once('Vista/nuevo.php');
    }

    public function evolucion(){
        include_once('Vista/evolucion.php');
    }

    public function revisar(){
        $pac= new modelo();
        $don= new modelo();
        
        if(isset($_REQUEST['id'])){
            $pac=$this->MODEL->cargarPaciente($_REQUEST['id']);
            $don=$this->MODEL->cargarDonante($_REQUEST['id']);
        }
        
        include_once('Vista/formulario.php');
    }

    public function nuevoEvolucion(){
        include_once('Vista/formevolucion.php');
    }

    public function verEvolucion(){
        $evo= new modelo();
       
        if(isset($_REQUEST['idEvolucion'])){
            $evo=$this->MODEL->cargarEvolucion($_REQUEST['idEvolucion']);
        }
        include_once('Vista/formevolucion.php');
        
    }

    public function guardar(){
        $pac = new modelo();
        
        $pac->idpaciente=$_POST['txtId'];
        $pac->idpersona=$_POST['txtIdpersona'];
        $pac->apaterno=$_POST['txtApaterno'];
        $pac->amaterno=$_POST['txtAmaterno'];
        $pac->nombres=$_POST['txtNombres'];
        $pac->edad=$_POST['txtEdad'];
        $pac->idsexo=$_POST['cmbSexo'];
        $pac->idorigen=$_POST['cmbProcedencia'];
       
        $pac->ftrasplante=$_POST['txtFtrasplante'];
        
        $pac->trasplante=$_POST['txtTrasplante'];

        ///////////////Historia///////////////
        $pac->historia=$_POST['txtHistoria'];
        $pac->antecedentes=$_POST['txtAntecedentes'];
        $pac->diagnostico=$_POST['txtDiagnostico'];
        $pac->isquemia=$_POST['txtIsquemia'];

         ///////////////Hospitalizacion///////////////
         $pac->diashospitalizado=$_POST['txtDhospitalizado'];
         
        ///////////////////////////////////////
        $pac->idgrfactor=$_POST['cmbGrfactor'];
        $pac->hla=$_POST['txtHla'];
        
        //////////////Donante////////////////
        $pac->idtipodonanted=$_POST['cmbTdonante'];
        $pac->idgrfactord=$_POST['cmbGrfactorD'];
        $pac->hlad=$_POST['txthlaD'];
        
        //////////////Tratamiento////////////////
        $pac->idtratamiento=$_POST['txtIdtratamiento'];
        $pac->medicacion=$_POST['txtMedicacion'];
        $pac->tratamiento=$_POST['txtTratamiento'];
        
        //////////////Complicaciones////////////////
        $pac->idcomptto=$_POST['txtIdcomptto'];
        $pac->intraoperatorio=$_POST['txtIntraoperatorio'];
        $pac->postoperatorio=$_POST['txtPostoperatorio'];
        
        //////////////Organo////////////////
        $pac->idorgano=$_POST['txtIdorgano'];
        $pac->caracteristicas=$_POST['txtOrgano'];
        
        $pac->idpaciente > 0 ? $this->MODEL->actualizarPaciente($pac) : $this->MODEL->registrar($pac);

        header("Location: index.php?c=ir&tipo=trasplantes");
    }

    public function eliminar(){
        $this->MODEL->eliminarPaciente($_REQUEST['id']);

        header("Location: index.php?c=ir&tipo=trasplantes");
    }

    public function guardarEvolucion(){
         $evol = new modelo();
         $evol->idevolucion=$_POST['txtIdevolucion'];
         $evol->fechaevolucion=$_POST['txtFevolucion'];
         $evol->evolucion=$_POST['txtEvolucion'];
         $evol->idtratamiento=$_POST['txtIdtratamiento']; //para actualizar, viene de registroevolucion
         $evol->idtratamiento2=$_POST['txtIdtratamiento'];//para insertar
         $idpaciente=$_POST['txtId'];
                 
         //$this->MODEL->registrarEv($evol);
        
         $evol->idevolucion > 0 ? $this->MODEL->actualizarEv($evol) : $this->MODEL->registrarEv($evol);
         header("Location: index.php?c=revisar&id=$idpaciente");
       
    }

    public function salir(){
        include_once 'Vista/logout.php';
    }
}

?>