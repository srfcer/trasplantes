<?php

require_once "conexion.php";

class GrFactorModelo{


    static public function mdlListarGrFactor(){

        $stmt = Conexion::conectar()->prepare("SELECT * FROM tblgrfactor");

        $stmt -> execute();

        return $stmt->fetchAll();
    }


    
}