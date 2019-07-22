
    $().ready(function() {
        
        // validate signup form on keyup and submit
        $("#signupForm").validate({
            rules: {
               //--->esto es de la vista registrar usuarioFotoPerfil[]
                password: {
                    required: true,
                    minlength: 5
                },
                confirm_password: {
                    required: true,
                    minlength: 5,
                    equalTo: "#password"
                },
                 pass1: {
                    required: true,
                    minlength: 5
                },
                pass2: {
                    required: true,
                    minlength: 5,
                    equalTo: "#pass1"
                },
            
              
            },
            messages: {
               //--->esto es de la vista registrar usuario
                password: {
                    required: "Ingrese una clave",
                    minlength: "Su clave debe tener mas de 5 caracteres"
                },
                confirm_password: {
                    required:"confirme su clave",
                    minlength: "Su clave debe tener mas de 5 caracteres",
                    equalTo: "Debe coinsidir con la clave ingresada"
                },
                pass1: {
                    required: "Ingrese una clave",
                    minlength: "Su clave debe tener mas de 5 caracteres"
                },
                pass2: {
                    required:"confirme su clave",
                    minlength: "Su clave debe tener mas de 5 caracteres",
                    equalTo: "Debe coinsidir con la clave ingresada"
                },

            }
        });

//         $("#signupForm").validate({  

// const campoNumerico = document.getElementById('campo-numerico');

// campoNumerico.addEventListener('keydown', function(evento) {
//   const teclaPresionada = evento.key;
//   const teclaPresionadaEsUnNumero =
//     Number.isInteger(parseInt(teclaPresionada));

//   const sePresionoUnaTeclaNoAdmitida = 
//     teclaPresionada != 'ArrowDown' &&
//     teclaPresionada != 'ArrowUp' &&
//     teclaPresionada != 'ArrowLeft' &&
//     teclaPresionada != 'ArrowRight' &&
//     teclaPresionada != 'Backspace' &&
//     teclaPresionada != 'Delete' &&
//     teclaPresionada != 'Enter' &&
//     !teclaPresionadaEsUnNumero;
//   const comienzaPorCero = 
//     campoNumerico.value.length === 0 &&
//     teclaPresionada == 0;

//   if (sePresionoUnaTeclaNoAdmitida || comienzaPorCero) {
//     evento.preventDefault(); 
//   }

// });
//           });

     
      
    });