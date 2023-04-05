<?php include_once 'Config/sesiones.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trasplantes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Datatable-->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css"/>

</head>

<body>
    <div class="container py-5" id="container">

        <nav>
            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Datos</button>
                <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Evolucion</button>
                
            </div>
        </nav>
        <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">

                <form method="post" action="?c=guardar">
                    <div class="card mb-3">
                        <div class="card-header bg-primary fw-bold bg-opacity-50">Datos Personales</div>
                        <div class="card-body bg-secondary bg-opacity-25">
                            <div class="row">
                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-2">
                                            <input class="form-control" type="hidden" name="txtId" value="<?php echo $pac->idpaciente ?>">
                                            <input class="form-control" type="hidden" name="txtIdpersona" value="<?php echo $pac->idpersona ?>">
                                            <label class="form-label fw-bold" for="">Apellido Paterno</label>
                                            <input class="form-control" type="text" name="txtApaterno" value="<?php echo $pac->apaterno ?>" required>
                                        </div>
                                        <div class="col-2">
                                            <label class="form-label fw-bold" for="">Apellido Materno</label>
                                            <input class="form-control" type="text" name="txtAmaterno" value="<?php echo $pac->amaterno ?>" required>
                                        </div>
                                        <div class="col-2">
                                            <label class="form-label fw-bold" for="">Nombres</label>
                                            <input class="form-control" type="text" name="txtNombres" value="<?php echo $pac->nombres ?>" required>
                                        </div>

                                        <div class="col-1">
                                            <label class="form-label fw-bold" for="">Edad</label>
                                            <input class="form-control" type="number" data-maxlength="3" name="txtEdad" value="<?php echo $pac->edad ?>">
                                        </div>

                                        <div class="col-1">
                                            <label class="form-label fw-bold">Sexo</label>
                                            <select class="form-select" name="cmbSexo">
                                                <option value="">Elegir</option>
                                                <?php foreach ($this->MODEL->cargarSexo() as $k) : ?>
                                                    <option value="<?php echo $k->idsexo ?>" <?php echo $k->idsexo == $pac->idsexo ? 'selected' : '' ?>><?php echo $k->sexo ?></option>
                                                <?php endforeach ?>
                                            </select>
                                        </div>

                                        <div class="col-2 mb-3">
                                            <label class="form-label fw-bold">Procedencia</label>
                                            <select class="form-select" name="cmbProcedencia">
                                                <option value="">Elegir</option>
                                                <?php foreach ($this->MODEL->cargarOrigen() as $k) : ?>
                                                    <option value="<?php echo $k->idorigen ?>" <?php echo $k->idorigen == $pac->idorigen ? 'selected' : '' ?>><?php echo $k->origen ?></option>
                                                <?php endforeach ?>
                                            </select>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header bg-primary fw-bold bg-opacity-50">Datos Clinicos</div>
                        <div class="card-body bg-secondary bg-opacity-25">
                            <div class="row">
                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-2">
                                            <label class="form-label fw-bold" for="">Fecha Trasplante</label>
                                            <input class="form-control" type="date" name="txtFtrasplante" value="<?php echo $pac->fechatrasplante ?>">
                                        </div>
                                        <div class="col-1">
                                            <label class="form-label fw-bold" for="">#Trasplante</label>
                                            <input class="form-control" type="text" name="txtTrasplante" value="<?php echo $pac->trasplante ?>">
                                        </div>
                                        <div class="col-3">
                                            <label class="form-label fw-bold" for="">Historia Clinica</label>
                                            <input class="form-control" type="text" name="txtHistoria" value="<?php echo $pac->historia ?>">
                                        </div>
                                        <div class="col-6">
                                            <label class="form-label fw-bold" for="">Antecedentes</label>
                                            <input class="form-control" type="text" name="txtAntecedentes" value="<?php echo $pac->antecedentes ?>">
                                        </div>

                                        <div class="col-6 py-3">
                                            <label class="form-label fw-bold" for="">Diagnostico Pre-Trasplante</label>
                                            <input class="form-control" type="text" name="txtDiagnostico" value="<?php echo $pac->diagnostico ?>">
                                        </div>

                                        <div class="col-6 py-3">
                                            <label class="form-label fw-bold" for="">H.L.A</label>
                                            <input class="form-control" type="text" name="txtHla" value="<?php echo $pac->hla ?>">
                                        </div>

                                        <div class="col-1 py-2">
                                            <label class="form-label fw-bold">Grupo</label>
                                            <select class="form-select" name="cmbGrfactor">
                                                <option value="">Elegir</option>
                                                <?php foreach ($this->MODEL->cargarGrfactor() as $k) : ?>
                                                    <option value="<?php echo $k->idgrfactor ?>" <?php echo $k->idgrfactor == $pac->idgrfactor ? 'selected' : '' ?>><?php echo $k->grfactor ?></option>
                                                <?php endforeach ?>
                                            </select>
                                        </div>

                                        <div class="col-4 py-2">
                                            <input class="form-control" type="hidden" name="txtIdorgano" value="<?php echo $pac->idorgano ?>">
                                            <label class="form-label fw-bold" for="">Caracteristicas del Riñon</label>
                                            <input class="form-control" type="text" name="txtOrgano" value="<?php echo $pac->organo ?>">
                                        </div>

                                        <div class="col-1 py-2">
                                            <label class="form-label fw-bold" for="">Isquemia</label>
                                            <input class="form-control" type="text" name="txtIsquemia" value="<?php echo $pac->isquemia ?>">
                                        </div>

                                        <div class="col-6 py-2">
                                            <input class="form-control" type="hidden" name="txtIdcomptto" value="<?php echo $pac->idcomptto ?>">
                                            <label class="form-label fw-bold" for="">Complicacion Intraoperatoria</label>
                                            <input class="form-control" type="text" name="txtIntraoperatorio" value="<?php echo $pac->intraoperatorio ?>">
                                        </div>

                                        <div class="col-6 py-2">
                                            <label class="form-label fw-bold" for="">Complicacion Postoperatoria</label>
                                            <input class="form-control" type="text" name="txtPostoperatorio" value="<?php echo $pac->postoperatorio ?>">
                                        </div>

                                        <div class="col-2 py-2">
                                            <label class="form-label fw-bold" for="">Fecha Alta</label>
                                            <input class="form-control" type="date" name="txtFalta" value="<?php //echo $pac->hla ?>" disabled>
                                        </div>

                                        <div class="col-1 py-2">
                                            <label class="form-label fw-bold" for="">Dias Hosp.</label>
                                            <input class="form-control" type="text" name="txtDhospitalizado" value="<?php echo $pac->dias ?>">
                                        </div>

                                        <div class="col-6 py-2">
                                            <label for="exampleFormControlTextarea1" class="form-label fw-bold">Medicacion Actual</label>
                                            <textarea class="form-control" name="txtMedicacion" rows="3"><?php echo $pac->medicacion ?></textarea>
                                        </div>

                                        <div class="col-6 py-2">
                                            <input class="form-control" type="hidden" name="txtIdtratamiento" value="<?php echo $pac->idtratamiento ?>">
                                            <label for="exampleFormControlTextarea1" class="form-label fw-bold">Tratamiento</label>
                                            <textarea class="form-control" name="txtTratamiento" rows="3"><?php echo $pac->tratamiento ?></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card mb-3 py-2">
                        <div class="card-header bg-secondary fw-bold text-white">Datos Donante</div>
                        <div class="card-body bg-secondary bg-opacity-25">
                            <div class="row">
                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-2 mb-3">
                                            <label class="form-label fw-bold">Tipo Donante</label>
                                            <select class="form-select" name="cmbTdonante">
                                                <option value="">Elegir</option>
                                                <?php foreach ($this->MODEL->cargarTipodonante() as $k) : ?>
                                                    <option value="<?php echo $k->idtipodonante ?>" <?php echo $k->idtipodonante == $don->idtipodonante ? 'selected' : '' ?>><?php echo $k->tipodonante ?></option>
                                                <?php endforeach ?>
                                            </select>
                                        </div>

                                        <div class="col-1">
                                            <label class="form-label fw-bold">Grupo</label>
                                            <select class="form-select" name="cmbGrfactorD">
                                                <option value="">Elegir</option>
                                                <?php foreach ($this->MODEL->cargarGrfactor() as $k) : ?>
                                                    <option value="<?php echo $k->idgrfactor ?>" <?php echo $k->idgrfactor == $don->idgrfactor ? 'selected' : '' ?>><?php echo $k->grfactor ?></option>
                                                <?php endforeach ?>
                                            </select>
                                        </div>

                                        <div class="col-6">
                                            <label class="form-label fw-bold" for="">HLA</label>
                                            <input class="form-control" type="text" name="txthlaD" value="<?php echo $don->hla ?>">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <button class="btn btn-primary text-shadow" type="submit" name="btnGu">Guardar Datos</button>
                            <a class="btn btn-secondary" href="?c=ir&tipo=trasplantes">Regresar</a>
                        </div>
                    </div>
                </form>

            </div>
<!---------------------------------------------------------Fin TAB FORM1 --------------------------------------------------------->

            <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">


                <!-- Button trigger modal -->
                <!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Agregar Evolucion
</button> -->

                <form method="post" action="" class="form" id="formEvolucion">
<!---------------------------------------------------------- Modal ------------------------------------------------------------>
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header bg-dark bg-opacity-25">
                                    <h5 class="modal-title" id="exampleModalLabel">Evolucion del Paciente</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <!-- ///---------contenido de formevolucion.php-------------/// -->
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                    <button type="submit" class="btn btn-primary" id="btnAgregar">Guardar Datos</button>  <!--///id funcion_new/// -->
                                </div>
                            </div>
                        </div>
                    </div>
<!--------------------------------------------------------- Fin Modal------------------------------------------------------- -->
                </form>


                
<!---------------------------------------------------------- Modal2 ------------------------------------------------------------>
                    <form method="post" action="?c=guardarEvolucion" class="form" name="form_edit_evol" id="form_edit_evol" 
                            onsubmit="event.preventDefault(); sendDataEvo();">                    
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header bg-dark bg-opacity-25">
                                    <h5 class="modal-title" id="exampleModalLabel">Evolucion del Paciente</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary">Guardar Datos</button>
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    </form>
<!--------------------------------------------------------- Fin Modal2------------------------------------------------------- -->
                


                <div class="container mt-4">


                    <div class="row">
                        <div class="col-md-12 col-md-offset-2">
                            <div class="card-body d-flex justify-content-between align-items-center">
                                <!-- Button trigger modal -->
                                    <!-- <button type="button" data-id='<?php echo $pac->idtratamiento ?>' class="btn btn-primary openBtn3">Registrar Evolucion</button> -->
                                    <button type="button" class="btn btn-primary opnEvo">Registrar Evolucion</button>
                                <a class="btn btn-secondary" href="?c=ir&tipo=trasplantes">Regresar</a>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <table id="tabla" class="table table-striped row-border display compact">
                            <thead>
                                <tr class="black-text">
                                    <input class="form-control" type="hidden" name="txtId" value="<?php echo $pac->idpaciente ?>" id="txtId"> 
                                    <input class="form-control" type="hidden" name="txtIdtratamiento" value="<?php echo $pac->idtratamiento ?>" id="txtIdtratamiento">
                                    <th>FECHA</th>
                                    <th>Estado evolucion paciente <label class="badge bg-secondary"><?php echo $pac->apaterno ?> <?php echo $pac->amaterno ?> <?php echo $pac->nombres ?></label></th>
                                    <th class="text-accent-1 text-center">ACCIONES</th>
                                </tr>
                            </thead>
                            <tbody id="registros">
                                <?php foreach ($this->MODEL->listarEvolucion($pac->idtratamiento) as $k) : ?>
                                    <tr>
                                        <td><?PHP echo $k->fecha ?></td>
                                        <td><?PHP echo $k->evolucion ?></td>

                                        <td class="text-center">
                                            <a href="#" idevo="<?php echo $k->idevolucion;?>" class="btn btn-info btn-sm editBtn" data-bs-toggle="modal" data-bs-target="#exampleModal">Editar</a>
                                            
                                            <a href="?c=eliminarEvolucion&idEvolucion=<?php echo $k->idevolucion; ?>" class="btn btn-danger btn-sm" onClick="">Borrar</a>
                                        </td>

                                    </tr>
                                <?PHP endforeach; ?>
                            </tbody>
                        </table>
                    </div>

                </div>
                <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">...</div>
            </div>


        </div>
        <script src="Resources/js/jquery-3.6.0.min.js" type="text/javascript"></script>
        
 
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
        <script src="Resources/js/tabs.js" type="text/javascript"></script>
        <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>

        <script src="Resources/js/funciones.js" type="text/javascript"></script>

       <!--funcionalidad datatable-->
        <!-- <script>
            $(document).ready(function () {
                $('#tabla').DataTable();
            });
        </script> -->
        
        <script>
            $('.openBtn1').click(function(){
                var idt=$("#txtIdtratamiento").val();
                $.ajax({
                    type:"POST",
                    url:"?c=nuevoEvolucion",
                    data:{
                        'txtIdtratamiento':  idt
                    },
                    success:function(data){
                        alert("Los datos fueron Guardados con exito");
                        $('#exampleModal').modal('show');
                    }

                });


            });
        </script>

        <script>
            $('.openBtn2').click(function( event ){
                    event.preventDefault();
                    var idt=$("#txtIdtratamiento").val();
                    console.log(idt);
                    //envio a registroevolucion.php
               $.ajax({
                    type:"POST",
                    url:"Vista/registroevolucion.php",
                    data:'txtIdtratamiento=' + idt,
                    success:function(){
                        alert("se envio con exito");
                       
                    }
                });
    
        });
        </script>
<!--
    https://www.instintoprogramador.com.mx/2020/10/cargar-contenido-dinamico-en-bootstrap.html
    https://www.it-swarm-es.com/es/php/pasando-la-identificacion-de-datos-del-boton-bootstrap-modal/809228071/
 -->
<script type='text/javascript'>
            $(document).ready(function(){
 
                $('.openBtn3').click(function(){
                   
                     var userid = $("#txtIdtratamiento").val();
                     var pacid = $("#txtId").val();
                    // AJAX request
                    $.ajax({
                        url: 'Vista/registroevolucion.php',
                        type: 'post',
                        data: {
                            userid: userid,
                            pacid:  pacid
                        },
                        success: function(response){ 
                            // Add response in Modal body
                            //alert(userid);
                            $('.modal-body').html(response); 
                            // Display Modal
                            $('#exampleModal').modal('show'); 
                        }
                    });
                });
            });
            </script> 

            <script>
$(document).ready(function(){
    $('a[data-bs-toggle="tab"]').on('show.bs.tab', function(e) {
        localStorage.setItem('activeTab', $(e.target).attr('href'));
    });
    var activeTab = localStorage.getItem('activeTab');
    if(activeTab){
        $('#myTab a[href="' + activeTab + '"]').tab('show');
    }
});
</script>
</body>

</html>