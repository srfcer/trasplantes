<?php

require_once "conexion.php";

class ProcedenciaModelo{


    static public function mdlListarProcedencia(){

        $stmt = Conexion::conectar()->prepare("SELECT * FROM tblprocedencia");

        $stmt -> execute();

        return $stmt->fetchAll();
    }


    
}