$(function(){
    $('#signupForm').on('click', '.crear', function (e) {
        e.preventDefault();
        
        var Nombre = $('#Nombre').val();
        var Direccion = $('#Direccion').val();
        var FechaInicio = $('#FechaInicio').val();
        var Cupos = $('#Cupos').val();
        var Region = $('#Region').val();
        var Comuna = $('#Comuna').val();
        var Descripcion = $('#Descripcion').val();
        var Categorias_id = $('#Categorias_id').val();
        var RangoEdadMin = $('#RangoEdadMin').val();
        var RangoEdadMax = $('#RangoEdadMax').val();
        var Modalidad_id = $('#Modalidad_id').val();
        var EstadosActivo_id = '2';
        
   


        $.ajax({
            url: $('#signupForm').attr('action'),
            type: 'POST',
            dataType: "json",
            data: {
                '_token': $("input[name='_token']").val(),
                'Nombre': Nombre,
                'Direccion': Direccion,
                'FechaInicio': FechaInicio,
                'Cupos': Cupos,
                'Region': Region,
                'Comuna': Comuna,
                'Descripcion': Descripcion,
                'Categorias_id': Categorias_id ,
                'RangoEdadMin': RangoEdadMin,
                'RangoEdadMax': RangoEdadMax,
                'Modalidad_id': Modalidad_id,
                'EstadosActivo_id': EstadosActivo_id
            },
            success: function (response) {
                alert("la url es: " + $('#signupForm').attr('action'));

                if (response.success == true) {
       
                    alert("yes" + response.msg);

                } else {

                    alert("Not" + response.error);

                }

            },
            error: function (error) {
                console.log(error);

                alert("error inesperado");
            }
        });

    });

});
