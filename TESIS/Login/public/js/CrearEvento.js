
    $().ready(function() {
        
        // validate signup form on keyup and submit
        $("#signupForm").validate({
            rules: {
            

                Cupos: {
                     minlength: 1,
                    required: true,
                    
                },
                RangoEdadMin: {
                     minlength: 1,
                    required: true,
                    
                },
                  RangoEdadMax: {
                     minlength: 1,
                    required: true,
                    
                },
              
            },
            messages: {
           
                   Cupos: {
                    minlength: "El valor ingresado debe ser igual o mayor a 1..",
                    required: "Caracter requerido", 
                },
                  RangoEdadMin: {
                          minlength: "El valor ingresado debe ser igual o mayor a 1..",
                    required: "Caracter requerido", 
                },
                 RangoEdadMax: {
                    minlength: "El valor ingresado debe ser igual o mayor a 1..",
                    required: "Caracter requerido", 
                  
                }
            }
        });

$('#signupForm').on('click', '#enviar', function (e) {
         var $uno =  parseInt( $("#RangoEdadMin").val());
         var $dos =     parseInt( $("#RangoEdadMax").val());
         var $cate = $('#Categorias_id option:selected').text();


          //validar rango de edad segun categoria seleccionada
          if ($cate == "Pre-Benjamín (5 a 8 años)") {
             if (($uno >= 5) && ($uno <=8) && ($dos<=8) && ($dos >=5)) {
                           }else{
                             var edad;
             edad = "Ingrese una edad de acuerdo al rango de la categoría";
             document.getElementById('categ').innerHTML = edad;
             e.preventDefault();
                           }
          }


           if ($cate == "Benjamín (8 a 9 años)") {
          if (($uno >= 8) && ($uno <=9) && ($dos<=9) && ($dos >=8)) {
                          }else{                    
                         var edad;
                         edad = "Ingrese una edad de acuerdo al rango de la categoría";
                         document.getElementById('categ').innerHTML = edad;
                         e.preventDefault();
                          }
          }


           if ($cate == "Alevín (10 a 11 años)") {
          if (($uno >= 10) && ($uno <=11) && ($dos<=11) && ($dos >=10)) {
                          }else{
                       var edad;
                       edad = "Ingrese una edad de acuerdo al rango de la categoría";
                       document.getElementById('categ').innerHTML = edad;
                       e.preventDefault();
                           }
          }  

          if ($cate == "Infantil (12 a 13 años)") {
          if (($uno >= 12) && ($uno <=13) && ($dos<=13) && ($dos >=11)) {
                          }else{
                       var edad;
                       edad = "Ingrese una edad de acuerdo al rango de la categoría";
                       document.getElementById('categ').innerHTML = edad;
                       e.preventDefault();
                           }
          } 

          if ($cate == "Cadete (14 a 15 años)") {
          if (($uno >= 14) && ($uno <=15) && ($dos<=15) && ($dos >=14)) {
                          }else{
                       var edad;
                       edad = "Ingrese una edad de acuerdo al rango de la categoría";
                       document.getElementById('categ').innerHTML = edad;
                       e.preventDefault();
                           }
          } 

          if ($cate == "Juvenil (16 a 18 años)") {
          if (($uno >= 16) && ($uno <=18) && ($dos<=18) && ($dos >=16)) {
                          }else{
                       var edad;
                       edad = "Ingrese una edad de acuerdo al rango de la categoría";
                       document.getElementById('categ').innerHTML = edad;
                       e.preventDefault();
                           }
          } 

          if ($cate == "Adulto (18 años en adelante)") {
          if (($uno >= 18)  &&  ($dos >=18)) {
                          }else{
                       var edad;
                       edad = "Ingrese una edad de acuerdo al rango de la categoría";
                       document.getElementById('categ').innerHTML = edad;
                       e.preventDefault();
                           }
          } 


             //edad menor no puede ser a la edad mayor  
         if ($uno > $dos) {
         var texto;
         texto = "Edad mínima debe ser menor a edad máxima";
         document.getElementById('mydiv').innerHTML = texto;
          e.preventDefault();
         }else{
          
         }

        });
     
      
    });



