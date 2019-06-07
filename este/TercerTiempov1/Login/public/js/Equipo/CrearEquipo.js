/*$(function(){
        $('#CrearEvento').on('click', '.crear', function (e) {
            e.preventDefault();
            //idCliente = $(this).attr("id").split("-");
            var formData = new FormData($("#E_Logo")[0]);

            //var E_Logo = $('#E_Logo');
         
            var E_Nombre = $('#E_Nombre').val();

            var Evento_id = $('#Evento_id').val();

            
        
            //alert("la url es: " + $('#signupForm').attr('action'));
            $.ajax({
                url: $('#CrearEvento').attr('action'),
                type: 'POST',
                dataType: "json",
                contentType: false,
                processData: false,
                headers: {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')},
                data: {
                    '_token': $("input[name='_token']").val(),
                    'E_Nombre': E_Nombre,
                    'Evento_id': Evento_id
                  
                },     
                
                success: function (response) {
               
                    if (response.success == true) {

                        alert("correcta, mensaje"+response.msg);

                    } else {

                        alert("no se pudo completar la accion"+response.error);

                    }

                },
                error: function (error) {
                console.log(error);
                alert("error inesperado");
                }
            });

        });

    });
    */
