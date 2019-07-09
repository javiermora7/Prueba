/*    $(function(){
        $('#signupForm').on('click', '.enviar', function (e) {
            e.preventDefault();
            //idCliente = $(this).attr("id").split("-");
            var Nombres = $('#Nombres').val();
            var Apellidos = $('#Apellidos').val();
            var Rut = $('#Rut').val();
            var Telefono = $('#Telefono').val();
            var password = $('#password').val();
            var Direccion = $('#Direccion').val();


            //alert("la url es: " + $('#signupForm').attr('action'));
            $.ajax({
                url: $('#signupForm').attr('action'),
                type: 'PUT',
                dataType: "json",
                data: {
                    '_token': $("input[name='_token']").val(),
                    'Nombres': Nombres,
                    'Apellidos': Apellidos,
                    'Rut': Rut,
                    'Telefono': Telefono,
                    'password': password,
                    'Direccion': Direccion
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
