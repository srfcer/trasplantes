//https://www.youtube.com/watch?v=3q4HtXUXHKA

$(function(){



});


 $('.opnEvo').click(function(e){



 });


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


		////////////////////////////////////////////FUNCION ENVIO FORMULARIO///////////////////////////////////////
        $('#formEvolucion').submit(function(e){
            e.preventDefault();
            insertar();
        });    

        ///////////////////////////////////FUNCION INSERTAR CONTROLADOR///////////////////////////////////////
        function insertar(){
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
                        
                        $('#formEvolucion input').removeAttr('disabled');
                        window.location.reload();
                        $('#exampleModal').modal('hide');
                        console.log(response);
                    },
                	error: function(error){ 
                    console.log(error);
                	}
            });
        }


        ///////////////////////////////////FUNCION CONSULTAR CONTROLADOR///////////////////////////////////////
        function consultarEvo(){

        }	

