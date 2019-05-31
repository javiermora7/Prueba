 /*var iniciar;
 iniciar=$(document);
 iniciar.ready(comparar);
 

 function comparar(){

$('#password2').keyup(function(){
  var x=$('#password').val();
  var a=$('#password2').val();


if (x == a) {
  
  $('#error').text("coinciden").css("color","green");

}else{
	 $('#error').text("no coinciden").css("color","red");
}
if(a == ""){

$('#error').text("no se puede dejar en blanco!").css("color","red");

}

});
 
 }*/

 //////////////////////////



    $().ready(function() {
        
        // validate signup form on keyup and submit
        $("#signupForm").validate({
            rules: {
               
                password: {
                    required: true,
                    minlength: 5
                },
                confirm_password: {
                    required: true,
                    minlength: 5,
                    equalTo: "#password"
                },
                RazonSocial: {
                    required: true,
                    
                },
                
              
            },
            messages: {
              
                password: {
                    required: "Ingrese una clave",
                    minlength: "Su clave debe tener mas de 5 caracteres"
                },
                confirm_password: {
                    required:"confirme su clave",
                    minlength: "Su clave debe tener mas de 5 caracteres",
                    equalTo: "Debe coinsidir con la clave ingresada"
                },
                  RazonSocial: {
                    required: "ingresa razon social",

                    
                },
            }
        });

      

     
      
    });