<?php include_once 'Config/sesiones.php'; ?>
<!DOCTYPE html>
<html lang="en">


<body>
    <div class="container">
       
        <div class="row">
            
            <div class="col-md-4 col-sm-4 col-xs-4">
            <label for="">Apellido Paterno</label>
            <input class="form-control" type="text" name="txtApaterno" value="" required>
        </div>

        <div class="col-md-4 col-sm-4 col-xs-4">
            <label for="">Apellido Materno</label>
            <input class="form-control" type="text" name="txtAmaterno" value="" required>
        </div>

        <div class="col-md-4 col-sm-4 col-xs-4">
            <label for="">Nombres</label>
            <input class="form-control" type="text" name="txtNombres" value="" required>
        </div>

        </div>

        <br>
        <div class="row">
            
            <div class="col-md-2 col-sm-2 col-xs-2">
            <label for="">Edad</label>
            <input class="form-control" type="number" min="0" max="100" name="txtEdad" value="">
        </div>

        <div class="col-md-2 col-sm-2 col-xs-2">
            <label>Sexo</label>
            <select class="form-select" name="cmbSexo">
                <option value="">Elegir</option>
                <?php foreach ($this->MODEL->cargarSexo() as $k) : ?> 
                <option value="<?php echo $k->idsexo ?>"><?php echo $k->sexo ?></option>
               <?php endforeach ?>
            </select>
        </div>

        <div class="col-md-4 col-sm-4 col-xs-4">
            <label>Procedencia</label>
            <select class="form-select" name="cmbProcedencia">
                <option value="">Seleccione</option>
                <?php foreach ($this->MODEL->cargarOrigen() as $k) : ?> 
                <option value="<?php echo $k->idorigen ?>"><?php echo $k->origen ?></option>
               <?php endforeach ?>
            </select>
        </div>

        </div>
        
        <br><br>
        
    
    </div>
    
</body>

</html>