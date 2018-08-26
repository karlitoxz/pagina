$(document).ready(function() {
	$( "#BtnEnviar" ).click(function() {
  		var nombre = $( "#nombre" ).val();
  		var email = $( "#email" ).val();
  		var message = $( "#message" ).val();

  			if (nombre == '') {
  				$( "#error_form" ).html('<font color="red">Debe completar el nombre</font>');
  				$( "#nombre" ).focus();
  				return false;
  			}else{
  				$( "#error_form" ).html('');
  			}

			if (validador(email)==false) {
					$('#error_form').html('<font color="red">Ingrese email valido</font>');
					$('#email').focus();
					return false;
				}else{
					$('#error_form').html('');
			}
  			if (message == '') {
  				$( "#error_form" ).html('<font color="red">Debe enviar un mensaje</font>');
  				$( "#message" ).focus();
  				return false;
  			}else{
  				$( "#error_form" ).html('');
  			}
  			if ($( "#message" ).val().length < 10) {
  				$( "#error_form" ).html('<font color="red">El mensaje debe contener al menos 10 palabras</font>');
  				$( "#message" ).focus();
  				return false;
  			}else{
  				$('#error_form').html('');
  			}
  			if (grecaptcha.getResponse() == "") {
				$('#error_form').html('<font color="red">Por favor llene la captcha </font>');
				$('#captcha').focus();
				return false;
			}else{
				enviar_correo(nombre,email,message);
			}
	});
});

function validador(email){
	var tester = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-]+)\.)+([a-zA-Z0-9]{2,4})+$/;
	return tester.test(email);
}

var enviar_correo = function (nombre,email,message) {
	$.ajax({
		url: 'assets/php/index.php',
		type: 'POST',
		data: {'nombre': nombre, 'email': email, 'message': message},
	})
	.done(function(data) {
		console.log("success"+data);
	})
	.fail(function(data) {
		console.log("error"+data);
	})
	.always(function(data) {
		console.log("complete"+data);
	});
	
}