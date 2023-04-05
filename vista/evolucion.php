<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Evolucion</title>
</head>

<body>
    <div class="container mt-4">
        <a href="?c=evolucion" class="btn btn-primary">Registrar Evolucion</a>
        <div class="card-body">

            <table id="tabla" class="table table-striped row-border display compact">
                <thead>
                    <tr class="black-text">
                        <th>FECHA</th>
                        <th>Evolucion</th>
                        <th class="text-accent-1 text-center">ACCIONES</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- <?php //foreach ($this->MODEL->listarPaciente() as $k) : 
                            ?> -->
                    <tr>
                        <td><?PHP // echo $k->trasplante 
                            ?></td>
                        <td><?PHP // echo $k->apaterno. " " .$k->amaterno. " " .$k->nombres 
                            ?></td>
                        <td><?PHP // echo $k->historia 
                            ?></td>
                        <td><?PHP // echo $k->origen 
                            ?></td>

                        <td class="text-center">
                            <a href="?c=revisar&id=<?php echo $k->idpaciente; ?>" class="btn btn-info btn-sm" onClick="">Revisar</a>
                            <a href="?c=eliminar&id=<?php echo $k->idpaciente; ?>" class="btn btn-danger btn-sm" onClick="">Borrar</a>
                        </td>

                    </tr>
                    <?PHP //endforeach; 
                    ?>
                </tbody>
            </table>
        </div>
</body>

</html>