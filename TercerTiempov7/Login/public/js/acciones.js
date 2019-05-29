function aparecelogin (){
	event.preventDefault();
	$("#login").animate({
		'top':'0'
	}, 500);
}
function desaparecelogin (){
	event.preventDefault();
	$("#login").animate({
		'top':'-100'
	}, 500);
}

function desaparece() {
	$("#registrar").fadeOut(300);
    $("#oscurecer").fadeOut(300);
}

function mostrarformulario(){

	$("#registrar").fadeIn(500);
	$("#oscurecer").click(desaparece);
	$("#salir").click(desaparece);
}

function apareceregistro(e){
	e.preventDefault();

	$("#oscurecer").fadeIn(500, mostrarformulario);
}

function mostrarLoginYRegistro(){
	$("#activarLogin").click(aparecelogin);
	$("#cerrar").click(desaparecelogin);
    $("#activarRegistro").click(apareceregistro);
}
$(document).ready(mostrarLoginYRegistro);