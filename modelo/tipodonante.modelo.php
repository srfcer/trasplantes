<?php

require_once "conexion.php";

class TipoDonanteModelo{

    static public function mdlListarTipoDonante(){

        $stmt = Conexion::conectar()->prepare("SELECT * FROM tbltipodonante");
        $stmt -> execute();
        return $stmt->fetchAll();
    }
    
}











