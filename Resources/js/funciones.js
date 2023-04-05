$(function(){

    
    ///////////////////Abrir formevolucion.php y pasa 2 parametros controlador////////////////////

    $('.opnEvo').click(function(e) {
        e.preventDefault();
        var idtto = $("#txtIdtratamiento").val();
        var idpac = $("#txtId").val();
        
        $.ajax({
            url: '?c=nuevoEvolucion',
            type: 'post',
            async: true,
            data: {idtto:idtto,idpac: idpac},
            success: function(response){ 
                console.log(response);
                 
              $('.modal-body').html(response);   
              $('#exampleModal').modal('show');
            },
            error: function(error){ 
                console.log(error);
            }
        });

        
    });

    ////////////////////////editar formevolucion.php//////////////////
    // https://www.youtube.com/watch?v=lIgFe20dYq4-->
    /* $('.editBtn').on('click', function(event) { //con boton editBtn
        event.preventDefault();
        var href=$(this).attr('href');
            $('.modal-body').load(href, function() {
                $('#exampleModal').modal('show');
            });
        }); */


    ////////////////////////Abre formevolucion.php controlador para editar y pasa 3 parametros//////////////////
    /////////////////////// https://www.youtube.com/watch?v=lIgFe20dYq4 ///////////////////////////
    
        $('.editBtn').click(function(e) {
            e.preventDefault();
            var idevo = $(this).attr('idevo'); //en el mismo boton
            var idpac = $("#txtId").val();
            var idtto = $("#txtIdtratamiento").val();
            
            $.ajax({
                url: '?c=verEvolucion&idEvolucion='+idevo,
                type: 'post',
                async: true,
                data: {idevo:idevo,idpac:idpac,idtto:idtto},
                success: function(response){ 
                    console.log(response);
                    $('.modal-body').html(response);
                    var href=$(this).attr('href');
                    $('.modal-body').on(href, function() {
                        $('#exampleModal').modal('show');
                    });
                },
                error: function(error){ 
                    console.log(error);
                }
            });
    
            
        });


        ////////////////////////////////////////////////////////////////////////////////
        $('#formEvolucion').submit(function(e){
            e.preventDefault();

            var intIdEvo = $('#txtIdevolucion').val();
            var strFevolucion = $('#txtFevolucion').val();
            var strEvolucion = $('#txtEvolucion').val();
            var intIdpac = $('#txtId').val();

             $.ajax({
                url: '?c=guardarEvolucion',
                type: 'post',
                async: true,
                data: $('#formEvolucion').serialize(),
                    beforeSend:function(){
                        $('#formEvolucion input').attr('disabled','disabled');
                    },
                    success: function(response){
                           
                           // $('#container').html(response).delay(2000);
                            $('#formEvolucion input').removeAttr('disabled');
                           // $("#tabla").load(location.href+" #tabla>*","");
                            window.location.reload();

                            

                                                   
                            $('#exampleModal').modal('hide');


                           // $("#nav-tab"").tabs("option", "active", 1); 
                            
                           
                         console.log(response);
                    },
                error: function(error){ 
                    console.log(error);
                }
            });


        });

});


/*$(function(){
                $('#tabla').DataTable({
                    language: {
                        "lengthMenu": "Mostrar _MENU_ registros",
                        "zeroRecords": "No se encontraron resultados",
                        "info": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                        "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
                        "infoFiltered": "(filtrado de un total de _MAX_ registros)",
                        "sSearch": "Buscar:",
                        "oPaginate": {
                            "sFirst": "Primero",
                            "sLast": "Último",
                            "sNext": "Siguiente",
                            "sPrevious": "Anterior"
                        },
                        "sProcessing": "Procesando...",
                    },
                    //para usar los botones   
                    responsive: "true",
                    dom: 'Bfrtilp',
                    buttons: [
                        {
                            extend: 'excelHtml5',
                            text: '<i class="fas fa-file-excel"></i> ',
                            titleAttr: 'Exportar a Excel',
                            className: 'btn btn-success'
                        },
                        {
                            extend: 'pdfHtml5',
                            text: '<i class="fas fa-file-pdf"></i> ',
                            titleAttr: 'Exportar a PDF',
                            className: 'btn btn-danger'
                        },
                        {
                            extend: 'print',
                            text: '<i class="fa fa-print"></i> ',
                            titleAttr: 'Imprimir',
                            className: 'btn btn-info'
                        },
                    ]
                });
});*/