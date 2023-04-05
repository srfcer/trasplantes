<?php include_once 'Config/sesiones.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Document</title>
</head>

<body>
    <div class="container">
    <form method="post" action="?c=guardar" class="form">
       
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

        <div class="col-md-4 col-sm-4 col-xs-4">
            <label for="">Edad</label>
            <input class="form-control" type="number"  data-maxlength="3" name="txtEdad" value="">
        </div>

        <div class="col-md-4 col-sm-4 col-xs-4">
            <label>Sexo</label>
            <select class="form-select" name="cmbSexo">
                <option value="">Seleccione</option>
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

        <br><br>
        <div class="col-md-4 col-sm-4 col-xs-4">
        <button class="btn btn-primary text-shadow" type="submit" name="btnGu">Guardar Datos
            <i class="material-icons right">save</i></button>

            <a class="btn btn-secondary" href="?c=ir&tipo=trasplantes">Cancelar</a>

        </div>

    </form>
    </div>
    <script src="Resources/js/jquery-3.6.0.min.js" type="text/javascript"></script>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
</body>

</html>