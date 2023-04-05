<?php 

    $menuUsuario = UsuarioControlador::ctrObtenerMenuUsuario($_SESSION["usuario"]->idusuario);
    //var_dump($menuUsuario);
?>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#" style="margin-left: 50px; border: none">M.G.R.A</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="nav navbar-nav">
            <li class="nav-item active">
                <!-- <a class="nav-link" href="#">Inicio <span class="sr-only">(current)</span></a> -->
                <a style="cursor:pointer;" class="nav-link" onclick="CargarContenido('vista/dashboard.php','container')">
                 Inicio
                </a>
            </li>
            <li class="nav-item">
                <a style="cursor:pointer;" class="nav-link" onclick="CargarContenido('vista/listarPacientes.php','container')">
                 Pacientes
                </a>
            </li>
            <li class="nav-item">
                <a style="cursor:pointer;" class="nav-link" onclick="CargarContenido('vista/cie10.php','container')">
                 CIE
                </a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                   Herramientas
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" id="cambiarClave" href="#">Cambiar Clave</a>
                    
                </div>
            </li>
                
        </ul>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown text-center">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <?php echo $_SESSION["usuario"]->apaterno ." ". $_SESSION['usuario']->amaterno ." ". $_SESSION['usuario']->nombres; ?>
                </a>
                <ul aria-labelledby="navbarDropdown" class="dropdown-menu text-center">
                    <li>
                        <a class="dropdown-item" href="#">
                            <img alt="30" src="Resources/img/user.png" width="30"/>
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="#"><?php echo $_SESSION['usuario']->tipo; ?></a>
                    </li>
                    <li>
                        <hr class="dropdown-divider"></hr>
                    </li>
                    <li>
                        <a class="dropdown-item" href="http://localhost/trasplantesv2?cerrar_sesion=1">Salir</a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</nav>



         <!-- Modal CAMBIAR CLAVE -->
         <div class="modal"  id="mdlCambiarClave" tabindex="-1">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Cambiar Clave</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                                                
                        <div class="col-lg-12">
                            <label class="" for="iptClaveActual"><i class="fa-solid fa-key"></i></i>
                                <span class="small">Clave Actual</span><span class="text-danger">*</span>
                            </label>
                            <input type="password" class="form-control" id="iptClaveActual" name="iptClaveActual" placeholder="Clave Actual" required>
                            <div class="invalid-feedback">Ingrese Clave Actual</div>
                        </div>

                        <div class="col-lg-12">
                            <label class="" for="iptNuevaClave1"><i class="fa-solid fa-key"></i></i>
                                <span class="small">Nueva Clave</span><span class="text-danger">*</span>
                            </label>
                            <input type="password" class="form-control" id="iptNuevaClave1" name="iptNuevaClave1" placeholder="Nueva Clave" required>
                            <div class="invalid-feedback">Ingrese Nueva Clave</div>
                        </div>

                        <div class="col-lg-12">
                            <label class="" for="iptNuevaClave2"><i class="fa-solid fa-key"></i></i>
                                <span class="small">Reingrese Nueva Clave</span><span class="text-danger">*</span>
                            </label>
                            <input type="password" class="form-control" id="iptNuevaClave2" name="iptNuevaClave2" placeholder="Reingrese Nueva Clave" required>
                            <div class="invalid-feedback">Reingrese Nueva Clave</div>
                        </div>


                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                    </div>
                </div>
                </div>
            </div>
            <!-- Modal CAMBIAR CLAVE -->

        <script>
        $(".nav-link").on('click', function() {
            $(".nav-link").removeClass('active');
            $(this).addClass('active');
        })

        $(document).ready(function() {
        /*===================================================================*/
        // EVENTO AL DAR CLICK EN CAMBIAR CONTRASEÑA
        /*===================================================================*/

        $("#cambiarClave").on("click",function() {
            //alert("cambiar clave");
            accion = 1;
            $("#mdlCambiarClave").modal('show')
        });

        });
        </script>
        <!--//////////////////////// FIN NAVBAR /////////////////////////////////////-->