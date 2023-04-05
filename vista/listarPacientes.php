<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link href="Resources/css/navbar.css" rel="stylesheet"> -->
</head>

<body>

    <!-- <div class="container mt-4"> -->
    <div class="content">
        <div class="container-fluid">

            <!-- INICIO MODAL REGISTROS -->
            <div class="modal fade" id="mdlRegistrarPaciente" role="dialog">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header bg-dark bg-opacity-25 py-1 align-items-center">
                            <h5 class="modal-title" id="exampleModalLabel">Registrar Datos del Paciente</h5>
                            <button type="button" class="btn btn-outline-primary text-white border-0 fs-5"
                                id="btnCerrarModalReg" data-bs-dismiss="modal" aria-label="Close"><i
                                    class="far fa-times-circle"></i></button>
                        </div>
                        <div class="modal-body">

                            <!-- Formulario para validacion dentro MODAL -->
                            <form class="needs-validation" novalidate>
                                <div class="row">

                                    <div class="col-lg-4">
                                        <label for="">
                                            <h4><span class="small">Apellido Paterno</span><span
                                                    class="text-danger">*</span></h4>
                                        </label>
                                        <input class="form-control" type="text" id="iptApellidoPaternoReg" required>
                                        <div class="invalid-feedback">Ingrese el Apellido Paterno</div>
                                    </div>

                                    <div class="col-lg-4">
                                        <label for="">
                                            <h4><span class="small">Apellido Materno</span><span
                                                    class="text-danger">*</span></h4>
                                        </label>
                                        <input class="form-control" type="text" id="iptApellidoMaternoReg" value=""
                                            required>
                                        <div class="invalid-feedback">Ingresar Apellido Materno</div>
                                    </div>

                                    <div class="col-lg-4">
                                        <label for="">
                                            <h4><span class="small">Nombres</span><span class="text-danger">*</span>
                                            </h4>
                                        </label>
                                        <input class="form-control" type="text" id="iptNombresReg" value="" required>
                                        <div class="invalid-feedback">Ingresar Nombre(s)</div>
                                    </div>

                                    <div class="col-lg-2 py-4">
                                        <div class="form-group mb-2">
                                            <label for="">
                                                <h4><span class="small">Edad</span><span class="text-danger">*</span>
                                                </h4>
                                            </label>
                                            <input class="form-control form-control-sm" type="number" min="0" max="100"
                                                id="iptEdadReg" value="" required>
                                            <div class="invalid-feedback">Ingrese Edad</div>
                                        </div>
                                    </div>

                                    <div class="col-lg-2 py-4">
                                        <div class="form-group mb-2">
                                            <label class="" for="selSexoReg">
                                                <h4><span class="small">Sexo</span><span class="text-danger">*</span>
                                                </h4>
                                            </label>
                                            <select class="form-select form-select-sm"
                                                aria-label=".form-select-sm example" id="selSexoReg" required></select>
                                            <div class="invalid-feedback">Elegir Sexo</div>
                                        </div>
                                    </div>

                                    <div class="col-lg-4 py-4">
                                        <div class="form-group mb-2">
                                            <label for="selProcedenciaReg">
                                                <h4><span class="small">Procedencia</span><span
                                                        class="text-danger">*</span>
                                                </h4>
                                            </label>
                                            <select class="form-select form-select-sm"
                                                aria-label=".form-select-sm example" id="selProcedenciaReg"
                                                required></select>
                                            <div class="invalid-feedback">Elegir Procedencia</div>
                                        </div>
                                    </div>


                                    <div class="card-footer">
                                        <!-- Botones para guardar y cerrar-->
                                        <button type="button" class="btn btn-danger mt-3 mx-2" style="width:170px;"
                                            data-bs-dismiss="modal" id="btnCancelarPaciente">Cerrar</button>
                                        <button type="button" class="btn btn-primary mt-3 mx-2" style="width:170px;"
                                            id="btnGuardarPaciente">Guardar</button>

                                    </div>
                                </div>
                            </form>
                            <!--cierra fomulario validacion-->

                        </div><!-- fin modal-body -->

                    </div>

                </div>


            </div>
            <!-- Fin Modal REGISTRO -->


            <!-- INICIO MODAL ACTUALIZACION Y DETALLES -->
            <div class="modal fade" id="mdlGestionarPaciente" data-bs-backdrop="static" data-bs-keyboard="false"
                role="dialog">
                <div class="modal-dialog modal-dialog-scrollable modal-xl">
                    <div class="modal-content">
                        <div class="modal-header bg-dark bg-opacity-25 py-1 align-items-center">
                            <h5 class="modal-title" id="detallesPaciente">Detalles Paciente</h5>
                            <button type="button" class="btn btn-outline-primary text-white border-0 fs-5"
                                id="btnCerrarModalAct" data-bs-dismiss="modal" aria-label="Close"><i
                                    class="far fa-times-circle"></i></button>
                        </div>
                        <div class="modal-body">
                            <!-- Formulario para validacion dentro MODAL -->
                            <form class="needs-validation" novalidate>

                                <nav>
                                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                        <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab"
                                            data-bs-target="#nav-detalles" type="button" role="tab" aria-controls="nav-detalles"
                                            aria-selected="true">Detalles</button>
                                        <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab"
                                            data-bs-target="#nav-evolucion" type="button" role="tab"
                                            aria-controls="nav-evolucion" aria-selected="false">Evolucion</button>

                                    </div>
                                </nav>

                                <div class="tab-content" id="nav-tabContent">
                                    <div class="tab-pane fade show active" id="nav-detalles" role="tabpanel"
                                        aria-labelledby="nav-home-tab" tabindex="0">

                                        <div class="card">

                                            <div class="card-header bg-primary fw-bold bg-opacity-50">Datos Personales
                                            </div>
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-2">
                                                        <input class="form-control" type="hidden" id="iptIdPersonaAct"
                                                            value="">
                                                        <input class="form-control" type="hidden" id="iptIdPacienteAct"
                                                            value="">
                                                        <label class="form-label fw-bold" for="">Apellido
                                                            Paterno</label>
                                                        <input class="form-control" type="text"
                                                            id="iptApellidoPaternoAct" required>
                                                        <div class="invalid-feedback">Ingrese el Apellido Paterno</div>
                                                    </div>
                                                    <div class="col-2">
                                                        <label class="form-label fw-bold" for="">Apellido
                                                            Materno</label>
                                                        <input class="form-control" type="text"
                                                            id="iptApellidoMaternoAct" required>
                                                        <div class="invalid-feedback">Ingrese el Apellido Materno</div>
                                                    </div>
                                                    <div class="col-lg-2">
                                                        <label class="form-label fw-bold" for="">Nombres</label>
                                                        <input class="form-control" type="text" id="iptNombresAct"
                                                            required>
                                                        <div class="invalid-feedback">Ingrese Nombres</div>
                                                    </div>

                                                    <div class="col-lg-1">
                                                        <label class="form-label fw-bold" for="">Edad</label>
                                                        <input class="form-control" type="number" data-maxlength="3"
                                                            id="iptEdadAct">
                                                        <div class="invalid-feedback">Falta Edad</div>
                                                    </div>

                                                    <div class="col-lg-1">
                                                        <label class="form-label fw-bold">Sexo</label>
                                                        <select class="form-select" id="selSexoAct" required></select>
                                                        <div class="invalid-feedback">Falta</div>
                                                    </div>

                                                    <div class="col-lg-2 mb-3">
                                                        <label class="form-label fw-bold">Procedencia</label>
                                                        <select class="form-select" id="selProcedenciaAct"
                                                            required></select>
                                                    </div>
                                                </div><!-- Fin Row -->
                                            </div><!-- Fin Card Body -->
                                        </div> <!-- Fin class Carda -->

                                        <!-- 2DA FILA DATOS CLINICOS -->
                                        <div class="card">
                                            <div class="card-header bg-primary fw-bold bg-opacity-50">Datos Clinicos
                                            </div>
                                            <div class="card-body bg-light bg-opacity-25">
                                                <div class="row">

                                                    <div class="col-2">
                                                        <label class="form-label fw-bold" for="">Fecha
                                                            Trasplante</label>
                                                        <input class="form-control" type="date" id="iptFechaTrasplante">
                                                    </div>
                                                    <div class="col-1">
                                                        <label class="form-label fw-bold" for="">Trasplante</label>
                                                        <input class="form-control" type="text" id="iptTrasplante"
                                                            value="">
                                                    </div>
                                                    <div class="col-3">
                                                        <label class="form-label fw-bold" for="">Historia
                                                            Clinica</label>
                                                        <input class="form-control" type="text" id="iptHistoria">
                                                    </div>
                                                    <div class="col-6">
                                                        <label class="form-label fw-bold" for="">Antecedentes</label>
                                                        <input class="form-control" type="text" id="iptAntecedentes">
                                                    </div>

                                                    <div class="col-6 py-3">
                                                        <label class="form-label fw-bold" for="">Diagnostico
                                                            Pre-Trasplante</label>
                                                        <input class="form-control" type="text" id="iptDiagnostico"
                                                            value="">
                                                    </div>

                                                    <div class="col-6 py-3">
                                                        <label class="form-label fw-bold" for="">H.L.A</label>
                                                        <input class="form-control" type="text" id="iptHla" value="">
                                                    </div>

                                                    <div class="col-1 py-2">
                                                        <label class="form-label fw-bold">Grupo</label>
                                                        <select class="form-select" id="selGrFactor"></select>
                                                    </div>

                                                    <div class="col-4 py-2">
                                                        <input class="form-control" type="hidden" id="iptIdOrgano">
                                                        <label class="form-label fw-bold" for="">Caracteristicas del
                                                            Riñon</label>
                                                        <input class="form-control" type="text" id="iptOrgano">
                                                    </div>

                                                    <div class="col-1 py-2">
                                                        <label class="form-label fw-bold" for="">Isquemia</label>
                                                        <input class="form-control" type="text" id="iptIsquemia">
                                                    </div>

                                                    <div class="col-6 py-2">
                                                        <input class="form-control" type="hidden"
                                                            id="iptIdComplicacionTto">
                                                        <label class="form-label fw-bold" for="">Complicacion
                                                            Intraoperatoria</label>
                                                        <input class="form-control" type="text" id="iptIntraoperatorio">
                                                    </div>

                                                    <div class="col-6 py-2">
                                                        <label class="form-label fw-bold" for="">Complicacion
                                                            Postoperatoria</label>
                                                        <input class="form-control" type="text" id="iptPostoperatorio">
                                                    </div>

                                                    <div class="col-2 py-2">
                                                        <label class="form-label fw-bold" for="">Fecha Alta</label>
                                                        <input class="form-control" type="date" id="iptAlta" disabled>
                                                    </div>

                                                    <div class="col-1 py-2">
                                                        <label class="form-label fw-bold" for="">Dias Hos</label>
                                                        <input class="form-control" type="text" id="iptHospitalizado">
                                                    </div>

                                                    <div class="col-6 py-2">
                                                        <label for="exampleFormControlTextarea1"
                                                            class="form-label fw-bold">Medicacion Actual</label>
                                                        <textarea class="form-control" id="iptMedicacion"
                                                            rows="3"></textarea>
                                                    </div>

                                                    <div class="col-6 py-2">
                                                        <input class="form-control" type="hidden"
                                                            name="txtIdtratamiento" value="">
                                                        <label for="exampleFormControlTextarea1"
                                                            class="form-label fw-bold">Tratamiento</label>
                                                        <textarea class="form-control" id="iptTratamiento"
                                                            rows="3"></textarea>
                                                    </div>
                                                </div>


                                            </div>
                                        </div> <!-- FIN DATOS CLINICOS -->


                                        <div class="card mb-3 py-2">
                                            <div class="card-header bg-secondary fw-bold text-white">Datos Donante</div>
                                            <div class="card-body bg-light bg-opacity-25">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="row">
                                                            <div class="col-2 mb-3">
                                                                <label class="form-label fw-bold">Tipo
                                                                    Donante</label>
                                                                <select class="form-select"
                                                                    id="selTipoDonante"></select>
                                                            </div>

                                                            <div class="col-1">
                                                                <label class="form-label fw-bold">Grupo</label>
                                                                <select class="form-select"
                                                                    id="selGrFactorDonante"></select>
                                                            </div>

                                                            <div class="col-6">
                                                                <label class="form-label fw-bold" for="">HLA</label>
                                                                <input class="form-control" type="text"
                                                                    id="iptHlaDonante" value="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div><!-- fin DATOS DONANTE -->

                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" id="btnCerrarAct"
                                                data-bs-dismiss="modal">Cerrar</button>
                                            <button type="button" class="btn btn-primary"
                                                id="btnActualizarPaciente">Guardar</button>
                                        </div>

                            </form>
                            <!--cierra fomulario validacion-->


                                    </div>

                                    <!-- TAB INDEX EVOLUCION -->
                                    <div class="tab-pane fade" id="nav-evolucion" role="tabpanel"
                                        aria-labelledby="nav-profile-tab" tabindex="0">


                                        <div class="content pb-2">
                                            <div class="row p-0 m-0">

                                                <!--LISTADO EVOLUCION PACIENTE -->
                                                <div class="col-md-9">
                                                    <div class="card card-info card-outline shadow">
                                                        <div class="card-header">
                                                            <h3 class="card-title" id="titulo1"><i class="fas fa-list"></i> Listado
                                                                Evolucion Paciente</h3>
                                                        </div>
                                                        <div class="card-body">
                                                            <table id="tblEvolucion" class="display nowrap table-striped w-100 shadow rounded">
                                                                <thead class="bg-info w-100 text-left">
                                                                    <th class="sorting sorting_asc">idEvolucion</th>
                                                                    <th>Fecha</th>
                                                                    <th>Evolucion</th>
                                                                    <th>IdTratamiento</th>
                                                                    <th class="text-accent-1 text-center">ACCIONES</th>
                                                                </thead>
                                                                <tbody class="small text left">

                                                                </tbody>
                                                            </table>


                                                        </div>
                                                    </div>
                                                </div>

                                                <!--FORMULARIO PARA REGISTRO Y EDICION EVOLUCION-->
                                                <div class="col-md-3">
                                                    <div class="card card-info card-outline shadow">
                                                        <div class="card-header">
                                                            <h3 class="card-title"><i class="fas fa-edit"></i> Registro
                                                                 Evolucion </h3>
                                                        </div>
                                                        <div class="card-body">
                                                            <!-- Formulario para validacion dentro MODAL -->
                                                            <form class="needs-validation" novalidate>
                                                                <div class="row">

                                                                    <div class="col-md-12">

                                                                        <div class="form-group mb-2">
                                                                            <input class="form-control" type="hidden"
                                                                                id="iptIdEvolucion">
                                                                            <input class="form-control" type="hidden"
                                                                                id="iptIdTratamiento">
                                                                            <label class="form-label">Fecha</label>
                                                                            <input class="form-control" type="date"
                                                                                id="iptFechaEvolucion" required >
                                                                                <div class="invalid-feedback">Elegir Fecha</div>

                                                                        </div>

                                                                    </div>

                                                                    <div class="col-md-12">

                                                                        <div class="form-group mb-2">

                                                                            <label for="" class="form-label">Descripcion Evolucion</label>
                                                                            <textarea type="text" class="form-control" id="iptDescripcionEvolucion" rows="4"  maxlength="80" required></textarea>
                                                                            <div class="invalid-feedback">
                                                                            Proporciona una Descripcion.
                                                                            </div>

                                                                            <!-- <label class="form-label">Descripcion de la Evolucion</label>
                                                                            <textarea class="form-control" id="iptDescripcionEvolucion"
                                                                                rows="4"  maxlength="80" required ></textarea>
                                                                                <div class="invalid-feedback">Describir Evolucion</div> -->

                                                                        </div>

                                                                    </div>

                                                                    <div class="col-md-12">
                                                                        <div class="form-group m-0 mt-2 text-center">

                                                                            <button type="button"
                                                                                class="btn btn-secondary"
                                                                                id="btnLimpiarEvolucion">Limpiar</button>
                                                                            <button type="button"
                                                                                class="btn btn-primary"
                                                                                id="btnAgregarEvolucion">Guardar</button>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div><!-- ./FIN Formulario para validacion dentro MODAL -->                
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                    </div>
                                    <!--FIN TAB PANEL EVOLUCION -->

                                </div>

                           
                        </div><!-- fin modal-body -->

                    </div>

                </div>


            </div>
            <!-- Fin Modal ACTUALIZACION -->
            <br>
            <div class="card card-info card-outline shadow">
                <div class="card-header">
                    <h3 class="card-title" id="tituloPacientes">
                        <i class="fas fa-list"></i> Listado de Paciente</h3>
                </div>

                <div class="card-body">

                    <table id="tbl_pacientes" class="table table-striped row-border display compact">
                        <thead class="bg-dark text-left">
                            <tr class="black-text">
                                <th></th>
                                <th>IdPe</th>
                                <th>IdPac</th>
                                <th>Apellidos y Nombres</th>
                                <th>A.Materno</th>
                                <th>Nombres</th>
                                <th>Edad</th>
                                <th>Sexo</th>
                                <th>idorigen</th>
                                <th>Procedencia</th>
                                <th>Fecha Trasplante</th>
                                <th>Trasplante</th>
                                <th>idOrgano</th>
                                <th>Organo</th>
                                <th>Historia</th>
                                <th>Antecedentes</th>
                                <th>Diagnostico</th>
                                <th>Isquemia</th>
                                <th>Dias Hosp</th>
                                <th>Hla</th>
                                <th>idGrFactor</th>
                                <th>idTratamiento</th>
                                <th>Medicacion</th>
                                <th>Tratamiento</th>
                                <th>id Comp Tto</th>
                                <th>Intraoperatorio</th>
                                <th>Postoperatorio</th>
                                <th>idtipodonante</th>
                                <th>idgrfactordonante</th>
                                <th>hladonante</th>
                                <th class="text-accent-1 text-center">OPCIONES</th>
                            </tr>
                        </thead>
                        <tbody>


                        </tbody>
                    </table>
                </div> <!-- Fin Card-body -->
            </div>

        </div>
    </div>
    </div>

</body>

<script>
var accion,accion_e;
var table, tbl_Evolucion;

/*===================================================================*/
// INICIALIZAMOS EL MENSAJE DE TIPO TOAST (EMERGENTE PARTE SUPERIOR)
/*===================================================================*/

var Toast = Swal.mixin({

    toast: true,
    position: 'top',
    showConfirmButton: false,
    timer: 3600
});


$(document).ready(function() {

    /* $.ajax({
         url: "ajax/pacientes.ajax.php",
         type: "POST",
         data: {
             'accion': 1
         }, //1: LISTAR PACIENTES
         dataType: 'json',
         success: function(respuesta) {
             console.log("respuesta", respuesta);
         }
     });*/


    /*===================================================================*/
    // SOLICITUD AJAX PARA CARGAR EL SELECT DE SEXO
    /*===================================================================*/
    $.ajax({
        url: "ajax/sexo.ajax.php",
        method: "POST",
        cache: false,
        contetype: false,
        processData: false,
        dataType: 'json',
        success: function(respuesta) {

            var options = '<option selected value="0">Elegir Sexo</option>';

            for (let index = 0; index < respuesta.length; index++) {
                options = options + '<option value=' + respuesta[index][0] + '>' + respuesta[index][
                    1
                ] + '</option>';

            }
            $("#selSexoReg").html(options);
            $("#selSexoAct").html(options);
        }
    });

    /*===================================================================*/
    // SOLICITUD AJAX PARA CARGAR EL SELECT DE PROCEDENCIA U ORIGEN
    /*===================================================================*/
    $.ajax({
        url: "ajax/procedencia.ajax.php",
        method: "POST",
        cache: false,
        contetype: false,
        processData: false,
        dataType: 'json',
        success: function(respuesta) {

            var options = '<option selected value="0">Seleccionar Procedencia</option>';

            for (let index = 0; index < respuesta.length; index++) {
                options = options + '<option value=' + respuesta[index][0] + '>' + respuesta[index][
                    1
                ] + '</option>';

            }
            $("#selProcedenciaReg").html(options);
            $("#selProcedenciaAct").html(options);
        }
    });


    /*===================================================================*/
    // SOLICITUD AJAX PARA CARGAR EL SELECT DE GRUPO Y FACTOR
    /*===================================================================*/
    $.ajax({
        url: "ajax/grfactor.ajax.php",
        method: "POST",
        cache: false,
        contetype: false,
        processData: false,
        dataType: 'json',
        success: function(respuesta) {

            var options = '<option selected value="0">Seleccionar </option>';

            for (let index = 0; index < respuesta.length; index++) {
                options = options + '<option value=' + respuesta[index][0] + '>' + respuesta[index][
                    1
                ] + '</option>';

            }
            $("#selGrFactor").html(options);
            $("#selGrFactorDonante").html(options);
        }
    });


    /*===================================================================*/
    // SOLICITUD AJAX PARA CARGAR EL SELECT DE TIPO DE DONANTE
    /*===================================================================*/
    $.ajax({
        url: "ajax/tipodonante.ajax.php",
        method: "POST",
        cache: false,
        contetype: false,
        processData: false,
        dataType: 'json',
        success: function(respuesta) {

            var options = '<option selected value="0">Elegir </option>';

            for (let index = 0; index < respuesta.length; index++) {
                options = options + '<option value=' + respuesta[index][0] + '>' +
                    respuesta[index][1] + '</option>';

            }
            $("#selTipoDonante").html(options);
        }
    });


    /*===================================================================*/
    // CARGA DEL LISTADO CON EL PLUGIN DATATABLE JS y los ICONOS DE OPERACION
    /*===================================================================*/
    table = $("#tbl_pacientes").DataTable({

        dom: 'Bfrtip',
        buttons: [{
                text: 'Registrar Nuevo Paciente',
                className: 'addNewRecord',
                action: function(e, dt, node, config) {
                    //EVENTO PARA LEVENTAR LA VENTA MODAL
                    $("#mdlRegistrarPaciente").modal('show');
                    accion = 2; //Registrar
                }
            },
            'excel', 'print', 'pageLength'
        ],
        pageLength: [5, 10, 15, 30, 50, 100],
        pageLength: 10,
        ajax: {
            url: "ajax/pacientes.ajax.php",
            dataSrc: '',
            type: "POST",
            data: {
                'accion': 1
            }, //1: LISTAR PACIENTES
        },
        responsive: {
            details: {
                type: 'column'
            }
        },
        columnDefs: [{
                targets: 0,
                orderable: false,
                className: 'control'
            },
            {
                targets: 1,
                visible: false,
            },
            {
                targets: 3,
                "render": function(data, type, row) {
                    return row[3] + " " + row[4] + " " + row[5];
                }
            },
            {
                targets: 4,
                visible: false,
            },
            {
                targets: 5,
                visible: false,
            },
            {
                targets: 6,
                visible: false,
            },
            {
                targets: 7,
                visible: false,
            },
            {
                targets: 8,
                visible: false,
            },
            {
                targets: 9,
                visible: true,
            },
            {
                targets: 10,
                visible: false,
            },
            {
                targets: 11,
                visible: false,
            },
            {
                targets: 12,
                visible: false,
            },
            {
                targets: 13,
                visible: false,
            },
            {
                targets: 14,
                visible: true,
            },
            {
                targets: 15,
                visible: false,
            },
            {
                targets: 16,
                visible: false,
            },
            {
                targets: 17,
                visible: false,
            },
            {
                targets: 18,
                visible: false,
            },
            {
                targets: 19,
                visible: false,
            },
            {
                targets: 20,
                visible: false,
            },
            {
                targets: 21,
                visible: false,
            },
            {
                targets: 22,
                visible: false,
            },
            {
                targets: 23,
                visible: false,
            },
            {
                targets: 24,
                visible: false,
            },
            {
                targets: 25,
                visible: false,
            },
            {
                targets: 26,
                visible: false,
            },
            {
                targets: 27,
                visible: false,
            },
            {
                targets: 28,
                visible: false,
            },
            {
                targets: 29,
                visible: false,
            },
            {
                targets: 30, //columna OPCIONES
                orderable: false,
                render: function(datqa, type, full, meta) {
                    return "<center>" +
                        "<span class='btnEditarPaciente text-primary px-1' style='cursor:pointer;'>" +
                        "<i class='fas fa-pencil-alt fs-5'></i>" +
                        "</span>" +
                        "<span class='btnEliminarPaciente text-danger px-1' style='cursor:pointer;'>" +
                        "<i class='fas fa-trash fs-5'></i>" +
                        "</span>" +
                        "</center>"
                }
            }
        ],
        language: {
            url: "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
        }


    });

    /*===================================================================*/
    // Evento al cerrar MODAL REGISTRAR PACIENTE
    /*===================================================================*/

    $("#btnCancelarPaciente, #btnCerrarModalReg").on('click', function() {
        
        $("#iptApellidoPaternoReg").val("");
        $("#iptApellidoMaternoReg").val("");
        $("#iptNombresReg").val("");
        $("#iptEdadReg").val("");
        $("#selSexoReg").val(0);
        $("#selProcedenciaReg").val(0);
        
    });

    /*===================================================================*/
    // Evento al cerrar MODAL GESTIONAR PACIENTE en boton y en la "X"
    /*===================================================================*/

    $("#mdlGestionarPaciente").on('click','#btnCerrarModalAct', function() {
        
        limpiarFormEvolucion();
    })

    /*===================================================================*/
    // Evento al cerrar MODAL GESTIONAR PACIENTE en boton Cerrar Modal
    /*===================================================================*/

    $("#mdlGestionarPaciente").on('click','#btnCerrarAct', function() {

        limpiarFormEvolucion();

    })

     /*===================================================================*/
    // Evento al cerrar MODAL GESTIONAR PACIENTE en boton Cerrar Modal
    /*===================================================================*/

    $("#mdlGestionarPaciente").on('click','#btnLimpiarEvolucion', function() {

        limpiarFormEvolucion();

    })

    /*===================================================================*/
    // EVENTO AL DAR CLICK EN EL BOTON EDITAR PACIENTE
    /*===================================================================*/
    $("#tbl_pacientes tbody").on('click', '.btnEditarPaciente', function() {

        accion = 3; //seteamos la accion para EDITAR

        $("#mdlGestionarPaciente").modal('show');

        var data = table.row($(this).parents('tr')).data();

        $("#iptIdPersonaAct").val(data[1]);
        $("#iptIdPacienteAct").val(data[2]);
        $("#iptApellidoPaternoAct").val(data[3]);
        $("#iptApellidoMaternoAct").val(data[4]);
        $("#iptNombresAct").val(data[5]);
        $("#iptEdadAct").val(data[6]);
        $("#selSexoAct").val(data[7]);
        $("#selProcedenciaAct").val(data[8]);
        $("#iptFechaTrasplante").val(data[10]);
        $("#iptTrasplante").val(data[11]);
        $("#iptIdOrgano").val(data[12]);
        $("#iptOrgano").val(data[13]);
        $("#iptHla").val(data[19]);
        $("#selGrFactor").val(data[20]);

        $("#iptHistoria").val(data[14]);
        $("#iptAntecedentes").val(data[15]);
        $("#iptDiagnostico").val(data[16]);
        $("#iptIsquemia").val(data[17]);
        $("#iptHospitalizado").val(data[18]);
        $("#iptIdTratamiento").val(data[21]); //envia a iptIdEvolucion
        $("#iptMedicacion").val(data[22]);
        $("#iptTratamiento").val(data[23]);
        $("#iptIdEvolucion").val(data[21]); //es el idtratamiento

        //$("#iptIdEvolucionTto").val(data[24]);
        $("#iptIdComplicacionTto").val(data[24]);
        $("#iptIntraoperatorio").val(data[25]);
        $("#iptPostoperatorio").val(data[26]);
        $("#selTipoDonante").val(data[27]);
        $("#selGrFactorDonante").val(data[28]);
        $("#iptHlaDonante").val(data[29]);
                       
        
        //console.log(data[9].replace(' Und(s)','').replace(' Kg(s)',''));

        // $("#nav-evolucion")
        // .removeClass("active");

        evolucionPaciente();
        

    })

    /*===================================================================*/
    // EVENTO AL DAR CLICK EN TAB EVOLUCION
    /*===================================================================*/

    $("#nav-profile-tab").on("click", function() {
      
        limpiarFormEvolucion();

    }); //fin click tab panel

    

}); //fin READY


document.getElementById("btnGuardarPaciente").addEventListener("click", function() {

    //Get the forms we want to add validation styles to
    var forms = document.getElementsByClassName('needs-validation');
    //Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {

        if (form.checkValidity() === true) {

            console.log("Listo para registrar al Paciente");
            Swal.fire({
                title: 'Esta seguro de Registrar al Paciente?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si, deseo registrarlo!',
                cancelButtonText: 'Cancelar',
            }).then((result) => {
                if (result.isConfirmed) {

                    var datos = new FormData();

                    datos.append("accion", accion);
                    datos.append("apaterno", $("#iptApellidoPaternoReg").val());
                    datos.append("amaterno", $("#iptApellidoMaternoReg").val());
                    datos.append("nombres", $("#iptNombresReg").val());
                    datos.append("idsexo", $("#selSexoReg").val());
                    datos.append("edad", $("#iptEdadReg").val());
                    datos.append("idorigen", $("#selProcedenciaReg").val());
                    //  console.log(datos);
                    if (accion == 2) {
                        var titulo_msj = "El paciente se registro correctamente"
                    }

                    $.ajax({
                        url: "ajax/pacientes.ajax.php",
                        method: "POST",
                        data: datos,
                        cache: false,
                        contentType: false,
                        processData: false,
                        dataType: 'json',
                        success: function(respuesta) {
                            console.log(respuesta);

                            if (respuesta == "ok") {
                                Toast.fire({
                                    icon: 'success',
                                    title: titulo_msj
                                });

                                table.ajax.reload();

                                $("#mdlRegistrarPaciente").modal('hide');

                                $("iptApellidoPaternoReg").val("");
                                $("iptApellidoMaternoReg").val("");
                                $("iptNombresReg").val("");
                                $("iptEdadReg").val("");
                                $("selSexoReg").val(0);
                                $("selProcedenciaReg").val(0);

                            } else {
                                Toast.fire({
                                    icon: 'error',
                                    title: 'El producto NO se registro'
                                });

                            }

                        }
                    });

                }
            })
        } else {
            console.log("No paso la validacion")
        }

        form.classList.add('was-validated');

    });
});

document.getElementById("btnCancelarPaciente").addEventListener("click", function() {
    $(".needs-validation").removeClass("was-validated");
})

document.getElementById("btnCerrarAct").addEventListener("click", function() {
    $(".needs-validation").removeClass("was-validated");
})

document.getElementById("btnActualizarPaciente").addEventListener("click", function() {

    //Get the forms we want to add validation styles to
    var forms = document.getElementsByClassName('needs-validation');
    //Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {

        if (form.checkValidity() === true) {

            console.log("Listo para Actualizar al Paciente");
            Swal.fire({
                title: 'Esta seguro de Actualizar al Paciente?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si, deseo Actualizarlo!',
                cancelButtonText: 'Cancelar',
            }).then((result) => {
                if (result.isConfirmed) {

                    var datos = new FormData();

                    datos.append("accion", accion);
                    datos.append("idpersona", $("#iptIdPersonaAct").val());
                    datos.append("apaterno", $("#iptApellidoPaternoAct").val());
                    datos.append("amaterno", $("#iptApellidoMaternoAct").val());
                    datos.append("nombres", $("#iptNombresAct").val());
                    datos.append("idsexo", $("#selSexoAct").val());
                    datos.append("edad", $("#iptEdadAct").val());
                    datos.append("idpaciente", $("#iptIdPacienteAct").val());
                    datos.append("idorigen", $("#selProcedenciaAct").val());
                    datos.append("idgrfactor", $("#selGrFactor").val());

                    datos.append("fechatrasplante", $("#iptFechaTrasplante").val());
                    datos.append("trasplante", $("#iptTrasplante").val());
                    datos.append("idorgano", $("#iptIdOrgano").val());
                    datos.append("organo", $("#iptOrgano").val());
                    datos.append("hla", $("#iptHla").val());

                    datos.append("historia", $("#iptHistoria").val());
                    datos.append("antecedentes", $("#iptAntecedentes").val());
                    datos.append("diagnostico", $("#iptDiagnostico").val());
                    datos.append("isquemia", $("#iptIsquemia").val());
                    datos.append("hospitalizado", $("#iptHospitalizado").val());
                    datos.append("idtratamiento", $("#iptIdTratamiento").val());
                    datos.append("medicacion", $("#iptMedicacion").val());
                    datos.append("tratamiento", $("#iptTratamiento").val());
                    /*datos.append("idevolucion", $("#iptIdEvolucion").val());
                    datos.append("idevoluciontto", $("#iptIdEvolucionTto").val());*/
                    datos.append("idcomplicaciontto", $("#iptIdComplicacionTto").val());
                    datos.append("intraoperatorio", $("#iptIntraoperatorio").val());
                    datos.append("postoperatorio", $("#iptPostoperatorio").val());
                    //Para Donante
                    datos.append("idtipodonante", $("#selTipoDonante").val());
                    datos.append("idgrfactordonante", $("#selGrFactorDonante").val());
                    datos.append("hladonante", $("#iptHlaDonante").val());

                    console.log(datos);
                    if (accion == 3) {
                        var titulo_msj = "El Paciente se Actualizo Correctamente"
                    }

                    $.ajax({
                        url: "ajax/pacientes.ajax.php",
                        method: "POST",
                        data: datos,
                        cache: false,
                        contentType: false,
                        processData: false,
                        dataType: 'json',
                        success: function(respuesta) {
                            console.log(respuesta);

                            if (respuesta == "ok") {
                                Toast.fire({
                                    icon: 'success',
                                    title: titulo_msj
                                });

                                table.ajax.reload();

                                $("#mdlGestionarPaciente").modal('hide');

                                $("iptIdPersonaAct").val("");
                                $("iptApellidoPaternoAct").val("");
                                $("iptApellidoMaternoAct").val("");
                                $("iptNombresAct").val("");
                                $("iptEdadAct").val("");
                                $("selSexoAct").val(0);
                                $("selProcedenciaAct").val(0);
                                $("selGrFactor").val(0);
                                $("iptHla").val("");

                                $("#selTipoDonante").val(0);
                                $("#selGrFactorDonante").val(0);
                                $("#iptHlaDonante").val("");
                            } else {
                                Toast.fire({
                                    icon: 'error',
                                    title: 'El producto NO se registro'
                                });

                            }

                        }
                    });

                }
            })
        } else {
            console.log("No paso la validacion")
        }

        form.classList.add('was-validated');
        $(".needs-validation").removeClass("was-validated");

    });
});

document.getElementById("btnAgregarEvolucion").addEventListener("click", function() {

    //Get the forms we want to add validation styles to
    var formsEvolucion = document.getElementsByClassName('needs-validation');
    //Loop over them and prevent submission
    var validation = Array.prototype.filter.call(formsEvolucion, function(form) {
        if (form.checkValidity() === true) {
           
            var tablita = $('#tblEvolucion').DataTable();
            fecha = $("#iptFechaEvolucion").val();
            evolucion = $("#iptDescripcionEvolucion").val();
            idevotto = $("#iptIdTratamiento").val();
            //idevolucion = $("#iptIdEvolucion").val();
            var datos = new FormData();

            datos.append("accion", accion_e);
            datos.append("fecha", fecha);
            datos.append("evolucion", evolucion);
            datos.append("idevotto", idevotto);
            datos.append("idevolucion", idEvolucion); //viene del click evolucion
            Swal.fire({
                title: 'Está seguro que desea agregar esta informacion?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Aceptar!',
                cancelButtonText: 'Cancelar!',
            }).then((result) => {
                console.log(datos);
                if (result.isConfirmed) {

                    $.ajax({
                        url: "ajax/evolucion.ajax.php",
                        type: "POST",
                        data: datos,
                        cache: false,
                        contentType: false,
                        processData: false,
                        dataType: 'json',
                        success: function(respuesta) {

                            Toast.fire({
                                icon: 'success',
                                title: respuesta
                            });

                            fecha = "";
                            evolucion = "";
                            idEvolucion = "";
                                                       
                            limpiarFormEvolucion();
                            tablita.ajax.reload();
                            //$(".needs-validation").removeClass("was-validated");
                        }
                    });
                }
            })
        } else {
            console.log("No paso la validacion")
            Toast.fire({icon:'error',title:"Campos Vacios"});
        }

        form.classList.add('was-validated');
        $(".needs-validation").removeClass("was-validated");

    }); //Fin formulario validacion

}); //Fin btnAgregarEvoluciopn


function evolucionPaciente() {
    
    accion_e = 2; //insertar evolucion
    console.log(accion);
    tbl_Evolucion = $('#tblEvolucion').DataTable({
        
        destroy: true,
       
        responsive: {
            details: {
                type: 'column'
            }
        },
        columnDefs: [{
                targets: 0,
                visible: false,
            },
            {
                targets: 3,
                visible: false,
            },
            {
                targets: 4, //columna OPCIONES
                orderable: true,
                render: function(datqa, type, full, meta) {
                    return "<center>" +
                        "<span class='btnEditarEvolucion text-primary px-1' style='cursor:pointer;'>" +
                        "<i class='fas fa-pencil-alt fs-5'></i>" +
                        "</span>" +
                        "<span class='btnEliminarEvolucion text-danger px-1' style='cursor:pointer;'>" +
                        "<i class='fas fa-trash fs-5'></i>" +
                        "</span>" +
                        "</center>"
                }
            }
        ],
        pageLength: [5, 10, 15],
        pageLength: 5,
        ajax: {
            url: "ajax/evolucion.ajax.php",
            //dataSrc: "",
            type: "POST",
            data: {
                'accion_e': 1,
                'idevolucion': $("#iptIdEvolucion").val()
            },
            dataType: 'json',
            dataSrc: function(respuesta) {
            //    console.log(respuesta);
           
                return respuesta;

                tbl_Evolucion.ajax.reload();
                
            }
        },
        language: {
            url: "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
        }


    }); //fin datatable


    $('#tblEvolucion tbody').on('click', '.btnEditarEvolucion', function() {
        
        accion_e = 3; //seteamos la accion para EDITAR EVOLUCION
        console.log(accion_e);
        var data = tbl_Evolucion.row($(this).parents('tr')).data();

        // if ($(this).parents('tr').hasClass('selected')) {

        //     $(this).parents('tr').removeClass('selected');

        //     idEvolucion = 0;
        //     $("#iptFechaEvolucion").val("");
        //     $("#iptDescripcionEvolucion").val("");

        // }else{

        //     tbl_Evolucion.$('tr.selected').removeClass('selected');                    
        //     $(this).parents('tr').addClass('selected'); 

        //     idEvolucion = data[0];
        //     $("#iptFechaEvolucion").val(data[1]);
        //     $("#iptDescripcionEvolucion").val(data[2]);
            
        // }

         
         if (tbl_Evolucion.$('tr.selected').removeClass('selected')) {

            $(this).parents('tr').addClass('selected');
            idEvolucion = data[0];
            $("#iptFechaEvolucion").val(data[1]);
            $("#iptDescripcionEvolucion").val(data[2]);
        }

           // tbl_Evolucion.$('tr.selected').removeClass('selected');                    


        });

}//fin funcion evolucion paciente

function limpiarFormEvolucion(){
        accion_e =2; //Despues de limpiar reseteo a 2 para insertar registros evolucion
        console.log(accion_e);
        tbl_Evolucion.$('tr.selected').removeClass('selected');
        idEvolucion=""; //limpiar idEvolucion en memoria
       $("#iptFechaEvolucion").val("");
       $("#iptDescripcionEvolucion").val(""); //limpiar textarea descripcion
}


</script>

</html>