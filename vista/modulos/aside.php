<?php 

    $menuUsuario = UsuarioControlador::ctrObtenerMenuUsuario($_SESSION["usuario"]->idusuario);

    //var_dump($menuUsuario);

?>

<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="vista/assets/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
            style="opacity: .8">
        <span class="brand-text font-weight-light">Mi Market POS</span>
    </a>

    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="vista/assets/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <h6 class="text-warning"><?php echo $_SESSION["usuario"]->nombre_usuario.' '.$_SESSION["usuario"]->apellido_usuario ?></h6>
        </div>
      </div>

    <!-- Sidebar -->
    <div class="sidebar">

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent" data-widget="treeview" role="menu" data-accordion="false">

                <?php foreach ($menuUsuario as $menu): ?>
                    <li class="nav-item">
                    <a style="cursor:pointer;" class="nav-link <?php ($menu->vista_inicio ==1) ? 'active':'' ?>" 
                        <?php if(!empty($menu->vista)):?>
                            onclick="CargarContenido('vista/<?php echo $menu->vista; ?>','content-wrapper')"
                        <?php endif;?>
                    >
                        <i class="nav-icon <?php echo $menu->icon_menu?>"></i>
                        <p>
                            <?php echo $menu->modulo?>
                            <?php if(empty($menu->vista)):?>
                                <i class="right fas fa-angle-left"></i>
                            <?php endif;?>
                        </p>
                    </a>

                    <?php if(empty($menu->vista)):?>

                        <?php 
                            $subMenuUsuario = UsuarioControlador::ctrObtenerSubMenuUsuario($menu->id);
                            ?>
                        <ul class="nav nav-treeview">

                            <?php foreach ($subMenuUsuario as $subMenu) : ?>
                                <li class="nav-item">
                                    <a class="button" class="nav-link" onclick="CargarContenido('vista/<?php echo $subMenu->vista; ?>','content-wrapper')">
                                        <i class="<?php echo $subMenu->icon_menu; ?> nav-icon"></i>
                                        <p> <?php echo $subMenu->modulo; ?></p>
                                    </a>     
                            <?php endforeach; ?>                

                        </ul>

                    <?php endif;?>

                    </li>

                   

                <?php endforeach; ?>


                <!-- 

                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Productos
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a style="cursor:pointer;" class="nav-link"
                                onclick="CargarContenido('vista/productos.php','content-wrapper')">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Inventario</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a style="cursor:pointer;" class="nav-link"
                                onclick="CargarContenido('vista/cargaMasivaProductos.php','content-wrapper')">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Carga Masiva</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a style="cursor:pointer;" class="nav-link"
                                onclick="CargarContenido('vista/categorias.php','content-wrapper')">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Categorias</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-store-alt"></i>
                        <p>Ventas<i class="right fas fa-angle-left"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="#" class="nav-link" style="cursor:pointer;"
                                onclick="CargarContenido('vista/ventas.php','content-wrapper')">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Punto de Venta</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link" style="cursor:pointer"
                                onclick="CargarContenido('vista/administrar_ventas.php','content-wrapper')">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Administrar Ventas</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a style="cursor:pointer;" class="nav-link"
                        onclick="CargarContenido('vista/compras.php','content-wrapper')">
                        <i class="nav-icon fas fa-th"></i>
                        <p>Compras</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a style="cursor:pointer;" class="nav-link"
                        onclick="CargarContenido('vista/reportes.php','content-wrapper')">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Reportes
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a style="cursor:pointer;" class="nav-link"
                        onclick="CargarContenido('vista/configuracion.php','content-wrapper')">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Configuracion
                        </p>
                    </a>
                </li> -->

                <li class="nav-item">
                    <a href="http://localhost/market-pos?cerrar_sesion=1" class="nav-link">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        <p>
                            Cerrar Sesion
                        </p>
                    </a>
                </li>


            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>

<script>
$(".nav-link").on('click', function() {
    $(".nav-link").removeClass('active');
    $(this).addClass('active');
})
</script>