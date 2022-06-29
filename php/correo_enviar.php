<?php
if(isset($_POST['email'])) {

$email_to = "jps.inmuebles@hotmail.com";
$email_subject = "Contacto desde el sitio web JP'S";

// Aquí se deberían validar los datos ingresados por el usuario
if(!isset($_POST['nombre']) ||
!isset($_POST['telefono']) ||
!isset($_POST['email']) ||
!isset($_POST['mensaje'])) {

echo "<b>Ocurrió un error y el formulario no ha sido enviado. </b><br />";
echo "Por favor, vuelva atrás y verifique la información ingresada<br />";
die();
}

$email_message = "Detalles del formulario de contacto:\n\n";
$email_message .= "Nombre: " . $_POST['nombre'] . "\n";
$email_message .= "Telefono: " . $_POST['telefono'] . "\n";
$email_message .= "E-mail: " . $_POST['email'] . "\n";
$email_message .= "Mensaje: " . $_POST['mensaje'] . "\n\n";


// Ahora se envía el e-mail usando la función mail() de PHP
$headers = 'From: '.$_POST['email']."\r\n".
'Reply-To: '.$_POST['email']."\r\n" .
'X-Mailer: PHP/' . phpversion();

$msj="";

	if (@mail($email_to, $email_subject, $email_message, $headers)) {
		$msj="Mensaje enviado correctamente";

		include "config.php";
		$conexion = mysqli_connect($server,$user,$pass,$db);
	    mysqli_set_charset($conexion, "utf8");
	          
	    $peticion = "INSERT INTO mensaje VALUES (null,
	       	'".$_POST['nombre']."',
	       	'".$_POST['telefono']."',
	       	'".$_POST['email']."',
	        '".$_POST['mensaje']."',
			'".date("Y-m-d")."',
	      	'0')";

	    $resultado = mysqli_query($conexion, $peticion);
	    mysqli_close($conexion); 

	} else {
		$msj="Error al enviar el mensaje.";
	}
	
	echo "<script type='text/javascript'>
			alert('".$msj."');
			window.location='../contacto.php';
		  </script>";
}
?>