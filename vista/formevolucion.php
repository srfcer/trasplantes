<?php 
if (session_status()==1) {
    session_start(); 
}

$evo_id= (isset($_POST['idevo'])) ? $_POST['idevo'] : "";
$tto_id=$_POST['idtto'];
$pac_id=$_POST['idpac'];


//include_once 'Config/sesiones.php';
// $txtFecha = (isset($_POST['txtFecha'])) ? $_POST['txtFecha'] : "$hoy"; 
$fecha= (!empty($_GET['idEvolucion'])) ? $evo->fecha : ""; 
$evolucion= (!empty($_GET['idEvolucion'])) ? $evo->evolucion : ""; 

//print_r($_POST);exit();

?>


<html>
    <body>
<div>
    <input class="form-control" type="hidden" name="txtIdevolucion" id="txtIdevolucion" value="<?php echo $evo_id ?>"> 
<input class="form-control" type="hidden" name="txtIdtratamiento" value="<?php echo $tto_id ?>" id="txtIdtratamiento">
<input class="form-control" type="hidden" name="txtId" id="txtId" value="<?php echo $pac_id ?>">
</div>

      
<div class="col-3">


    <label class="form-label fw-bold">Fecha</label>
    <input class="form-control" type="date" name="txtFevolucion" id="txtFevolucion" value="<?php echo $fecha ?>">
</div>
      <br>
<div class="mb-3">
  <label class="form-label fw-bold">Descripcion de la Evolucion</label>
  <textarea class="form-control" name="txtEvolucion" id="txtEvolucion" rows="3"><?php echo $evolucion ?></textarea>
</div>

</body>
</html>