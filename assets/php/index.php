<?php
$nombre=$_REQUEST["nombre"];
$email=$_REQUEST["email"];
$message=$_REQUEST["message"];
echo $nombre;
echo $email;
echo $message;
	if ($email != '') {
		//Envio de correo
		echo 'es distinto';
		require('PHPMailer.php');
		$mail = new PHPMailer;

							//From email address and name
							$mail->From = "contacto@salomeritualesdeamor.com";
							$mail->FromName = "Salome rituales de AMOR";

							//To address and name
							$mail->addAddress($email, $nombre);
							
							//Address to which recipient will reply
							$mail->addReplyTo("contacto@salomeritualesdeamor.com", "Salome rituales de AMOR");

							//Send HTML or Plain Text email
							$mail->isHTML(true);

							$mail->Subject = 'Contacto desde salomeritualesdeamor.com';
							$mail->Body = "<strong>Contacto de: </strong><h2>".$nombre."</h2> con la direccion de correo: ".$email." y <strong>el mensaje:</strong> ".$message;
							
							echo 'llego hasta aca';
							if(!$mail->send()) 
							{
							    echo "Mailer Error: " . $mail->ErrorInfo;
							} 
							else 
							{
							    echo "Message has been sent successfully";
							}
		//Envio de correo
	}else{
		echo 'fail';
	}
?>