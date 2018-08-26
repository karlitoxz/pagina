<?php
$nombre=$_REQUEST["nombre"];
$email=$_REQUEST["email"];
$message=$_REQUEST["message"];

	if ($email != '') {
		//Envio de correo
			$para = $email;
			$titulo = 'Gracias por contactarnos: '.$nombre;
			$mensaje = '<html>'.
						'<head><title>salomeritualesdeamor.com</title></head>'.
						'<body><h1>salomeritualesdeamor.com</h1>'.
						'Gracis por contactarnos: '.$nombre.' con el correo: '.$email.
						'<hr>'.
						' y el mensaje: '.$message.
						'<hr>'.
						'<strong> En pocos instantes un asesor se contactar con usted.'.
						'</body>'.
						'</html>';
			$cabeceras = 'MIME-Version: 1.0' . "\r\n";
			$cabeceras .= 'Content-type: text/html; charset=utf-8' . "\r\n";
			$cabeceras .= 'From: contacto@salomeritualesdeamor.com';

			$enviado = mail($para, $titulo, $mensaje, $cabeceras);

			if ($enviado) {
				echo 'ok';
			}else{
				echo 'fail';
			}
		//Envio de correo
	}else{
		echo 'fail';
	}
?>