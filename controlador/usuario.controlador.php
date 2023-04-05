<?php

class UsuarioControlador{

    /* 
    Validar el acceso del usuario
    */
    public function login(){

        if(isset($_POST["loginUsuario"])){

            $usuario = $_POST["loginUsuario"];
           // $password = crypt($_POST["loginPassword"],'$2a$07$azybxcags23425sdg23sdfhsd$');
            $password = $_POST["loginPassword"];

            $respuesta = UsuarioModelo::mdlIniciarSesion($usuario, $password);

            if(count($respuesta) > 0){

                $_SESSION["usuario"] = $respuesta[0];

                echo '
                    <script>
                        window.location = "http://localhost/trasplantesv2/";
                    </script>
              
                ';
            }else{

                echo '
                    <script>
                        fncSweetAlert("error","Usuario y/o password inválido","http://localhost/trasplantesv2/");
                    </script>
                
                ';
            }

        }
    }


    static public function ctrObtenerMenuUsuario($id_usuario){

        $menuUsuario = UsuarioModelo::mdlObtenerMenuUsuario($id_usuario);

        return $menuUsuario;
    }

    

    

}