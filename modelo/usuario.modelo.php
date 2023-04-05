<?php

require_once "conexion.php";

class UsuarioModelo{

    static public function mdlIniciarSesion($usuario, $password){

        $logFile = fopen("log.txt", 'a') or die("Error creando archivo");
        fwrite($logFile, date("d/m/Y H:i:s"). '  ' . $usuario.'-'.$password."\n") or die("Error escribiendo en el archivo");
        fclose($logFile);

        $pdo =Conexion::conectar();
        
        $stmt = $pdo->prepare("SELECT u.idusuario,u.usuario,u.clave,p.nombres,p.apaterno,p.amaterno,t.tipo,u.estado 
                                from tblusuario u 
                                INNER JOIN tblpersona p on u.idpersona=p.idpersona 
                                INNER JOIN tbltipo t on u.idtipo = t.idtipo 
                                WHERE u.usuario = :usuario and u.clave=:password");

        $stmt->bindParam(":usuario", $usuario, PDO::PARAM_STR);
        $stmt->bindParam(":password", $password, PDO::PARAM_STR);

        $stmt->execute();

        return $stmt-> fetchAll(PDO::FETCH_CLASS);

    }


    static public function mdlObtenerMenuUsuario($id_usuario){

        $stmt = Conexion::conectar()->prepare("SELECT u.idusuario,u.usuario,p.nombres,p.apaterno,p.amaterno,t.tipo,u.estado 
                                                FROM tblusuario u 
                                                INNER JOIN tblpersona p on u.idpersona=p.idpersona 
                                                INNER JOIN tbltipo t on u.idtipo = t.idtipo 
                                                WHERE u.idusuario = :id_usuario");

        $stmt->bindParam(":id_usuario", $id_usuario, PDO::PARAM_STR);

        $stmt->execute();

	    return $stmt-> fetchAll(PDO::FETCH_CLASS);

    }
       


    
    

}