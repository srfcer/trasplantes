<?php include_once 'Config/sesiones.php';?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
            <meta content="IE=edge" http-equiv="X-UA-Compatible">
                <meta content="width=device-width, initial-scale=1.0" name="viewport">
                    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
                        <link href="Resources/css/navbar.css" rel="stylesheet">
                            <title>
                                Inicio
                            </title>
                        </link>
                    </link>
                </meta>
            </meta>
        </meta>
    </head>
    <body>
        <!-- INICIO NAVBAR -->
        <nav class="navbar navbar-expand-lg text-white">
            <div class="container-fluid">
                <a class="nav-brand btn btn-outline-light" href="#" style="margin-left: 10px; border: none">
                    MGRA
                </a>
                <button aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler" data-bs-target="#navbarNavDropdown" data-bs-toggle="collapse" type="button">
                    <span class="navbar-toggler-icon">
                    </span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a aria-current="page" class="btn btn-outline-light active" href="?c=ir&tipo=inicio" style="margin-left: 10px; border: none">
                                Inicio
                            </a>
                        </li>
                        <li class="nav-item">
                            <a aria-current="page" class="btn btn-outline-light" href="?c=ir&tipo=trasplantes" style="margin-left: 10px; border: none">
                                Pacientes
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="btn btn-outline-light" href="#" style="margin-left: 10px; border: none">
                                CIE
                            </a>
                        </li>
                        <li class="nav-item dropdown">
                            <a aria-expanded="false" class="btn btn-outline-light dropdown-toggle" data-bs-toggle="dropdown" href="#" id="navbarDropdownMenuLink" role="button" style="margin-left: 10px; border: none">
                                Herramientas
                            </a>
                            <ul aria-labelledby="navbarDropdownMenuLink" class="dropdown-menu">
                                <li>
                                    <a class="dropdown-item" href="#">
                                        Cambiar Clave
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="#">
                                        Another action
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="#">
                                        Something else here
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                    <ul class="navbar-nav">
                        <li class="nav-item dropdown text-center">
                            <a aria-expanded="false" class="nav-brand btn btn-outline-light dropdown-toggle" data-bs-toggle="dropdown" href="#" id="navbarDropdown" role="button" style="margin-left: 10px; border: none">
                                <?php echo $_SESSION['apaterno'] . " " . $_SESSION['amaterno'] . " " . $_SESSION['nombres']; ?>
                            </a>
                            <ul aria-labelledby="navbarDropdown" class="dropdown-menu text-center">
                                <li>
                                    <a class="dropdown-item" href="#">
                                        <img alt="30" src="Resources/img/user.png" width="30"/>
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="#">
                                        <?PHP echo $_SESSION['rol']; ?>
                                    </a>
                                </li>
                                <li>
                                    <hr class="dropdown-divider">
                                    </hr>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="?c=salir">
                                        Salir
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!--//////////////////////// FIN NAVBAR /////////////////////////////////////-->
        
        <div class="container">
                        
            <div class="card mb-3 mt-5">
            <img loading="lazy" width="860" height="538" src="https://www.sistemasanaliticos.com/wp-content/uploads/2021/09/interna-transplantes-que-mas-se-necesitan-en-peru-1024x538.jpg" alt="donación de órganos" class="card-img-top wp-image-1367" srcset="https://www.sistemasanaliticos.com/wp-content/uploads/2021/09/interna-transplantes-que-mas-se-necesitan-en-peru-1024x538.jpg 1024w, https://www.sistemasanaliticos.com/wp-content/uploads/2021/09/interna-transplantes-que-mas-se-necesitan-en-peru-300x158.jpg 300w, https://www.sistemasanaliticos.com/wp-content/uploads/2021/09/interna-transplantes-que-mas-se-necesitan-en-peru-768x403.jpg 768w, https://www.sistemasanaliticos.com/wp-content/uploads/2021/09/interna-transplantes-que-mas-se-necesitan-en-peru.jpg 1200w" sizes="(max-width: 709px) 85vw, (max-width: 909px) 67vw, (max-width: 1362px) 62vw, 840px">
                <div class="card-body">
                    <h5 class="card-title">
                        Card title
                    </h5>
                    <p class="card-text">
                        This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.
                    </p>
                    <p class="card-text">
                        <small class="text-muted">
                            Last updated 3 mins ago
                        </small>
                    </p>
                </div>
            </img>
        </div>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">
                    Card title
                </h5>
                <p class="card-text">
                    This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.
                </p>
                <p class="card-text">
                    <small class="text-muted">
                        Last updated 3 mins ago
                    </small>
                </p>
            </div>
            <img alt="..." class="card-img-bottom" src="...">
            </img>
        </div>

        </div>


        <script src="Resources/js/jquery-3.6.0.min.js" type="text/javascript">
        </script>
        <!--<script src="https://code.jquery.com/jquery-3.6.0.js"></script>-->
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js">
        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js">
        </script>
    </body>
</html>