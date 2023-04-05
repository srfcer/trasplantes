<?php

require_once "conexion.php";

class EvolucionModelo{


    static public function mdlListarEvolucion($idevolucion){

        $pdo=Conexion::conectar();
        $stmt= $pdo->prepare("SELECT ev.idevolucion,ev.fecha,ev.evolucion,tto.idtratamiento, '' as opciones  
                                FROM tblevolucion ev 
                                LEFT JOIN tbltratamiento tto ON ev.idevotto = tto.idtratamiento 
                                WHERE ev.idevotto=:idevolucion"); 

        $stmt -> bindParam(":idevolucion",$idevolucion,PDO::PARAM_STR);
        $stmt -> execute();

        return $stmt->fetchAll();
    }


    static public function mdlRegistrarEvolucion($fecha, $evolucion, $idevotto){

        $stmt = Conexion::conectar()->prepare("INSERT INTO tblevolucion(fecha,evolucion,idevotto) 
            VALUES(:fecha,:evolucion,:idevotto)");

            $stmt -> bindParam(":fecha",$fecha, PDO::PARAM_STR);
            $stmt -> bindParam(":evolucion",$evolucion, PDO::PARAM_STR);
            $stmt -> bindParam(":idevotto",$idevotto, PDO::PARAM_STR);

            if($stmt -> execute()){
                $resultado = "Se Guardo la Evolucion correctamente.";
            }else{
                $resultado = "Error al registrar la Evolucion";
            }

             return $resultado;
        
            $stmt = null;

    }


    static public function mdlActualizarEvolucion($fecha, $evolucion, $idevolucion){

        $stmt = Conexion::conectar()->prepare("UPDATE tblevolucion SET fecha=:fecha,evolucion=:evolucion WHERE idevolucion=:idevolucion");

            $stmt -> bindParam(":fecha",$fecha, PDO::PARAM_STR);
            $stmt -> bindParam(":evolucion",$evolucion, PDO::PARAM_STR);
            $stmt -> bindParam(":idevolucion",$idevolucion, PDO::PARAM_INT);

            if($stmt -> execute()){
                $resultado = "Se Actualizo la Evolucion correctamente.";
            }else{
                $resultado = "Error al Actualizar la Evolucion";
            }

             return $resultado;
        
            $stmt = null;

    }
    
}