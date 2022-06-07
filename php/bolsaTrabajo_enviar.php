<?php
// Aquí se deberían validar los datos ingresados por el usuario
if(!isset($_POST['nombre']) ||
!isset($_POST['apellidos']) ||
!isset($_POST['telefono']) ||
!isset($_POST['email']) ||
!isset($_POST['comentario'])) {

echo "<b>Ocurrió un error y el formulario no ha sido enviado. </b><br />";
echo "Por favor, vuelva atrás y verifique la información ingresada<br />";
die();
} else {
//				COMIENZA LA COPIA DEL ARCHIVO IMAGEN **********************


$formatos = array('.pdf');
		
		$nombreArchivo = $_FILES['curriculum']['name'];
		$nombreTmpArchivo = $_FILES['curriculum']['tmp_name'];
		$ext = substr($nombreArchivo, strrpos($nombreArchivo, '.'));
		//return end(explode(".", $str));Otra forma de obtener la extension..
		//$dir = "photo/$nombreArchivo";

		if (in_array($ext, $formatos)) {			
			/*if ($_FILES['archivo']['size']<400000) {
				echo "Bien!!, tu archivo solo pesa: ".$_FILES['archivo']['size'];
			} else {
				echo "Solo se admiten archivos con un tamaño menor a 400kb tu archivo pesa: ".$_FILES['archivo']['size'];
			}*/

		include "config.php";
		$conexion = mysqli_connect($server,$user,$pass,$db);
        mysqli_set_charset($conexion, "utf8");
		$peticion = "SELECT count(idbolsatrabajo)+1 AS n FROM bolsatrabajo";        
        $resultado = mysqli_query($conexion, $peticion);		
		
		while($fila = mysqli_fetch_array($resultado)){
			$nombreArchivo= $fila['n']."-".$_POST['nombre'];
		}

		$nombreArchivo = $nombreArchivo.$ext;

			if (move_uploaded_file($nombreTmpArchivo, "../curriculum/$nombreArchivo")) {				
			    $peticion = "INSERT INTO bolsatrabajo VALUES (null,
			       	'".$_POST['nombre']."',
			       	'".$_POST['apellidos']."',
			       	'".$_POST['telefono']."',
			       	'".$_POST['email']."',
			       	'".$nombreArchivo."',
			       	'".$_POST['comentario']."')";
			    $resultado = mysqli_query($conexion, $peticion);

				echo "
		        <script type='text/javascript'>
		        	alert('Solicitud Enviada');
		            window.location='../bolsa_trabajo.php';
		        </script>";

			} else {
				echo "Ocurrio un error al guardar la imagen.";
			}				
		} else {
			echo "Formato de archivo Invalido..";
		}	  
}
?>