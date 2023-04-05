<?php

require_once "conexion.php";

class SexoModelo{


    static public function mdlListarSexo(){

        $stmt = Conexion::conectar()->prepare("SELECT * FROM tblsexo");

        $stmt -> execute();

        return $stmt->fetchAll();
    }


    
}