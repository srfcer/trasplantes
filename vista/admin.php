<?php include_once 'Config/sesiones.php';?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
A D M I N I S T R A D O R
Buenas tardes Ing. <?php echo $_SESSION['apaterno']. " ".$_SESSION['amaterno']." ".$_SESSION['nombres'];?>
</body>
</html>