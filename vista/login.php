<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="Resources\css\login.css" rel="stylesheet" type="text/css">
    <title>LOGIN SISTEMA MGRA</title>
   
</head>
<body>
<div id="login-button">
  <img src="https://dqcgrsy5v35b9.cloudfront.net/cruiseplanner/assets/img/icons/login-w-icon.png">
  </img>
</div>
<div id="container">
  <h1>Login</h1>
  <span class="close-btn">
    <img src="https://cdn4.iconfinder.com/data/icons/miu/22/circle_close_delete_-128.png"></img>
  </span>

  <form method="POST" action="">
    <input type="text" name="loginUsuario" placeholder="usuario">
    <input type="password" name="loginPassword" placeholder="clave">
   
    <div class="row">
        <?php
            $login = new UsuarioControlador();
            $login->login();
        ?>
    </div>
    <!-- <a href="#">Iniciar sesion</a> -->
    <input type="submit" name="btnLogin" value="Iniciar Sesion"/>
    <div id="remember-container">
      <input type="checkbox" id="checkbox-2-1" class="checkbox" checked="checked"/>
      <span id="remember">Remember me</span>
      <span id="forgotten">Forgotten password</span>
    </div>
</form>
</div>

<!-- Forgotten Password Container -->
<div id="forgotten-container">
   <h1>Forgotten</h1>
  <span class="close-btn">
    <img src="https://cdn4.iconfinder.com/data/icons/miu/22/circle_close_delete_-128.png"></img>
  </span>

  <form>
    <input type="email" name="email" placeholder="E-mail">
    <a href="#" class="orange-btn">Get new password</a>
</form>
</div>

<!-- jQuery -->
<script src="vista/assets/plugins/jquery/jquery.min.js"></script>
<!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> -->
<script src="Resources\js\login.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/gsap/1.18.0/TweenMax.min.js"></script>


<!-- jQuery -->
<!-- <script src="vista/assets/plugins/jquery/jquery.min.js"></script> -->
<!-- Bootstrap 4 -->
<!-- <script src="vista/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script> -->
<!-- AdminLTE App -->
<!-- <script src="vista/assets/dist/js/adminlte.min.js"></script> -->

</body>
</html>