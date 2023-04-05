
<html>
	<body>
    
  
<div class="col-3">

<input class="form-control" type="hidden" name="txtId" value="">
<input class="form-control" type="hidden" name="txtIdtratamiento" value="">

    <input class="form-control" type="text" name="txtIdevolucion" value="<?php echo $evo->idevolucion ?>"> <!-- update evolucion -->
    <input class="form-control" type="text" name="txtIdp" value="<?php echo $evo->idpaciente ?>">
    <input class="form-control" type="text" name="txtIdevotto" value="<?php echo $evo->idevotto ?>">
    <label class="form-label fw-bold">Fecha</label>
    <input class="form-control" type="date" name="txtFevolucion" value="<?php echo $fechita ?>">
</div>
      <br>
<div class="mb-3">
  <label class="form-label fw-bold">Descripcion de la Evolucion</label>
  <textarea class="form-control" name="txtEvolucion" rows="3"><?php echo $evolucion ?></textarea>
</div>



</body>
</html>