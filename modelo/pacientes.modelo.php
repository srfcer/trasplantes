<?php

require_once "conexion.php";
use PhpOffice\PhpSpreadsheet\IOFactory;


class PacientesModelo{


    /*===================================================================*/
    // Obtener listado total de pacientes para el datatable
    /*===================================================================*/

    static public function mdlListarPacientes(){


        $stmt=Conexion::conectar()->prepare("SELECT '' as detalles, pe.idpersona
                                                ,pa.idpaciente,pe.apaterno,pe.amaterno,pe.nombres,pe.edad,pe.idsexo,pa.idorigen,
                                                pr.origen,tr.fechatrasplante,tr.trasplante
                                                ,og.idorgano,og.organo,hi.historia,hi.antecedentes,hi.diagnostico,hi.isquemia
                                                ,ho.dias,pa.hla,pa.idgrfactor,tto.idtratamiento,tto.medicacion,tto.tratamiento
                                                ,co.idcomptto,co.intraoperatorio
                                                ,co.postoperatorio,td.idtipodonante,td.idgrfactor,td.hla 
                                                , '' as opciones 
                                                FROM tblpaciente pa 
                                                LEFT JOIN tblpersona pe ON pa.idpersona = pe.idpersona 
                                                LEFT JOIN tblprocedencia pr ON pr.idorigen = pa.idorigen 
                                                LEFT OUTER JOIN tbltrasplante tr ON pa.idpaciente=tr.idtrasplante 
                                                LEFT JOIN tblorgano og ON tr.idorgano = og.idorgano 
                                                LEFT OUTER JOIN tblhistoria hi ON pa.idpaciente=hi.idhistoria 
                                                LEFT JOIN tblhospitalizacion ho ON pa.idpaciente=ho.idpaciente 
                                                LEFT JOIN tbltratamiento tto ON pa.idpaciente=tto.idpaciente 
                                                LEFT JOIN tblcomplicaciones co ON tto.idtratamiento=co.idcomptto 
                                                LEFT JOIN tbldonante td ON td.iddonante=pa.idpaciente
                                                ORDER BY pe.apaterno desc"); 

        $stmt->execute();

        return $stmt->fetchAll();

    }


    static public function mdlRegistrarPaciente($apaterno, $amaterno,$nombres,$edad,$idsexo,$idorigen){

        try {
        $pdo=Conexion::conectar();
        $stmt= $pdo->prepare("INSERT INTO tblpersona (apaterno,amaterno,nombres,edad,idsexo) 
                                                values (:apaterno,:amaterno,:nombres,:edad,:idsexo)");
        $stmt -> bindParam(":apaterno",$apaterno,PDO::PARAM_STR);
        $stmt -> bindParam(":amaterno",$amaterno,PDO::PARAM_STR);
        $stmt -> bindParam(":nombres",$nombres,PDO::PARAM_STR);
        $stmt -> bindParam(":edad",$edad,PDO::PARAM_STR);
        $stmt -> bindParam(":idsexo",$idsexo,PDO::PARAM_STR);
        $stmt->execute();
        $last_idpersona= $pdo->lastInsertId();//obtiene el ultimo idpersona
       
        $stmt= $pdo->prepare("INSERT INTO tblpaciente (idpersona,idorigen) values (:idpersona,:idorigen)"); 
        $stmt -> bindParam(":idpersona",$last_idpersona,PDO::PARAM_STR);
        $stmt -> bindParam(":idorigen",$idorigen,PDO::PARAM_STR); //variable $idorigen
        $stmt->execute();
        $last_id = $pdo->lastInsertId();
                
        $stmt= $pdo->prepare("INSERT INTO tbltrasplante (idtrasplante) values (:idtrasplante)");
        $stmt -> bindParam(":idtrasplante",$last_id,PDO::PARAM_STR);
        $stmt->execute();

        $stmt= $pdo->prepare("INSERT INTO tblhistoria (idhistoria) values (:idhistoria)"); 
        $stmt -> bindParam(":idhistoria",$last_id,PDO::PARAM_STR);
        $stmt->execute();

        $stmt= $pdo->prepare("INSERT INTO tblhospitalizacion (idpaciente) values (:idpaciente)"); 
        $stmt -> bindParam(":idpaciente",$last_id,PDO::PARAM_STR);
        $stmt->execute();

        $stmt= $pdo->prepare("INSERT INTO tbltratamiento (idpaciente) values (:idpaciente)"); 
        $stmt -> bindParam(":idpaciente",$last_id,PDO::PARAM_STR);
        $stmt->execute();

        $stmt= $pdo->prepare("INSERT INTO tbldonante (iddonante) values (:iddonante)"); 
        $stmt -> bindParam(":iddonante",$last_id,PDO::PARAM_STR);
        $stmt->execute();

            if($stmt){
                $resultado = "ok";

               // printf($resultado);
                
            }else{
                $resultado = "error";
            }                                
                           
        } catch (Exception $e) {
            $resultado='Excepcion capturada: '. $e->getMessage(). "\n";
        }
        return $resultado;
        $stmt=null;

    }



    // static public function mdlActualizarPaciente($apaterno, $amaterno,$nombres,$edad,$idsexo,$idpersona){
    static public function mdlActualizarPaciente($data){

        
            $pdo=Conexion::conectar();
            
            $query="UPDATE tblpersona SET apaterno=:apaterno,amaterno=:amaterno,nombres=:nombres,edad=:edad,idsexo=:idsexo 
                    WHERE idpersona=:idpersona";
            $stmt=$pdo->prepare($query);
            $stmt->bindValue(":apaterno",$data['apaterno'], PDO::PARAM_STR);
            $stmt->bindParam(":amaterno",$data['amaterno'], PDO::PARAM_STR);
            $stmt->bindParam(":nombres",$data['nombres'], PDO::PARAM_STR);
            $stmt->bindParam(":edad",$data['edad'], PDO::PARAM_INT);
            $stmt->bindParam(":idsexo",$data['idsexo'], PDO::PARAM_INT);
            $stmt->bindParam(":idpersona",$data['idpersona'], PDO::PARAM_INT);
            $stmt->execute();            
                                 
            $query="UPDATE tblpaciente SET idorigen=:idorigen,idgrfactor=:idgrfactor,hla=:hla WHERE idpaciente=:idpaciente"; 
            $stmt=$pdo->prepare($query);
            /*$stmt->execute(array($data->idorigen,$data->idgrfactor,$data->hla,$data->idpaciente));*/
            $stmt->bindValue(":idorigen",$data['idorigen'], PDO::PARAM_STR);
            $stmt->bindParam(":idgrfactor",$data['idgrfactor'], PDO::PARAM_STR);
            $stmt->bindParam(":hla",$data['hla'], PDO::PARAM_STR);
            $stmt->bindParam(":idpaciente",$data['idpaciente'], PDO::PARAM_INT);
            $stmt->execute(); 

            if($data['idorgano'] >0){ // si existe datos en el campo idorgano de la tbltrasplante se actualiza
                $query="UPDATE tblorgano SET organo=:organo where idorgano=:idorgano"; 
                $stmt=$pdo->prepare($query);
                $stmt->bindValue(":organo",$data['organo'], PDO::PARAM_STR);
                $stmt->bindParam(":idorgano",$data['idorgano'], PDO::PARAM_STR);
                $stmt->execute(); 

                $query="UPDATE tbltrasplante SET trasplante=:trasplante,fechatrasplante=:fechatrasplante,idorgano=:idorgano 
                        WHERE idtrasplante=:idpaciente"; 
                $stmt=$pdo->prepare($query);
                $stmt->bindValue(":trasplante",$data['trasplante'], PDO::PARAM_STR);
                $stmt->bindParam(":fechatrasplante",$data['fechatrasplante'], PDO::PARAM_STR);
                $stmt->bindParam(":idorgano",$data['idorgano'], PDO::PARAM_STR);
                $stmt->bindParam(":idpaciente",$data['idpaciente'], PDO::PARAM_INT);
                $stmt->execute(); 
                               
            }else{ // si esta vacio el campo idorgano en tbltrasplante se inserta el registro 
                $query="INSERT INTO tblorgano (organo) values (:organo)"; 
                $stmt=$pdo->prepare($query);
                $stmt->bindParam(":organo",$data['organo'], PDO::PARAM_STR);
                $stmt->execute(); 
                $last_idorgano = $pdo->lastInsertId(); //obtiene el ultimo idorgano

                $query="UPDATE tbltrasplante SET trasplante=:trasplante,fechatrasplante=:fechatrasplante,idorgano=:idorgano 
                        WHERE idtrasplante=:idpaciente"; 
                $stmt=$pdo->prepare($query);
                $stmt->bindValue(":trasplante",$data['trasplante'], PDO::PARAM_STR);
                $stmt->bindParam(":fechatrasplante",$data['fechatrasplante'], PDO::PARAM_STR);
                $stmt->bindParam(":idorgano",$last_idorgano, PDO::PARAM_STR);
                $stmt->bindParam(":idpaciente",$data['idpaciente'], PDO::PARAM_INT);
                $stmt->execute(); 
            }

            $query="UPDATE tblhistoria SET historia=:historia,antecedentes=:antecedentes,diagnostico=:diagnostico,isquemia=:isquemia WHERE idhistoria=:idpaciente"; 
            $stmt=$pdo->prepare($query);
            $stmt->bindParam(":historia",$data['historia'], PDO::PARAM_STR);
            $stmt->bindParam(":antecedentes",$data['antecedentes'], PDO::PARAM_STR);
            $stmt->bindParam(":diagnostico",$data['diagnostico'], PDO::PARAM_STR);
            $stmt->bindParam(":isquemia",$data['isquemia'], PDO::PARAM_STR);
            $stmt->bindParam(":idpaciente",$data['idpaciente'], PDO::PARAM_INT);
            $stmt->execute();            
            
            $query="UPDATE tblhospitalizacion SET dias=:diashosp WHERE idpaciente=:idpaciente"; 
            $stmt=$pdo->prepare($query);
            $stmt->bindParam(":diashosp",$data['hospitalizado'], PDO::PARAM_STR);
            $stmt->bindParam(":idpaciente",$data['idpaciente'], PDO::PARAM_INT);
            $stmt->execute();

            $query="UPDATE tbltratamiento SET medicacion=:medicacion,tratamiento=:tratamiento WHERE idpaciente=:idpaciente"; 
            $stmt=$pdo->prepare($query);
            //$stmt->execute(array($data->medicacion,$data->tratamiento,$data->idpaciente));
            $stmt->bindParam(":medicacion",$data['medicacion'], PDO::PARAM_STR);
            $stmt->bindParam(":tratamiento",$data['tratamiento'], PDO::PARAM_STR);
            $stmt->bindParam(":idpaciente",$data['idpaciente'], PDO::PARAM_INT);
            $stmt->execute();            
            
            $query="UPDATE tbldonante SET idtipodonante=:idtipodonante,idgrfactor=:idgrfactordonante,hla=:hladonante WHERE iddonante=:iddonante"; 
            $stmt=$pdo->prepare($query);
            //$stmt->execute(array($data->idtipodonanted,$data->idgrfactord,$data->hlad,$data->idpaciente));
            $stmt->bindParam(":idtipodonante",$data['idtipodonante'], PDO::PARAM_STR);
            $stmt->bindParam(":idgrfactordonante",$data['idgrfactordonante'], PDO::PARAM_STR);
            $stmt->bindParam(":hladonante",$data['hladonante'], PDO::PARAM_STR);
            $stmt->bindParam(":iddonante",$data['idpaciente'], PDO::PARAM_INT);
            $stmt->execute(); 

            if($data['idcomplicaciontto'] >0){ // si existe datos en campo idcomptto de tblcomplicaciones se actualiza
                $query="UPDATE tblcomplicaciones SET intraoperatorio=:intraoperatorio,postoperatorio=:postoperatorio where idcomptto=:idcomptto"; 
                $stmt=$pdo->prepare($query);
                //$stmt->execute(array($data->intraoperatorio,$data->postoperatorio,$data->idcomptto));
                $stmt->bindParam(":intraoperatorio",$data['intraoperatorio'], PDO::PARAM_STR);
                $stmt->bindParam(":postoperatorio",$data['postoperatorio'], PDO::PARAM_STR);
                $stmt->bindParam(":idcomptto",$data['idcomplicaciontto'], PDO::PARAM_INT);
                $stmt->execute();

            }else{ // si esta vacio el campo idorgano en tbltrasplante se inserta el registro 
                $query="INSERT INTO tblcomplicaciones (intraoperatorio,postoperatorio,idcomptto) values (:intraoperatorio,:postoperatorio,:idtratamiento)"; 
                $stmt=$pdo->prepare($query);
                //$stmt->execute(array($data->intraoperatorio,$data->postoperatorio,$data->idtratamiento
                $stmt->bindParam(":intraoperatorio",$data['intraoperatorio'], PDO::PARAM_STR);
                $stmt->bindParam(":postoperatorio",$data['postoperatorio'], PDO::PARAM_STR);
                $stmt->bindParam(":idtratamiento",$data['idtratamiento'], PDO::PARAM_INT);
                $stmt->execute();
            }
        
        if($stmt){
            return "ok";
        }else{
            return $pdo->errorInfo();
        }


    }

}

    