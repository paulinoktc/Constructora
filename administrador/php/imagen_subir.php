<?php 
$formatos = array('.jpg','.jpeg','.png');	
	if (isset($_POST['submit'])) {
		
		$nombreArchivo = $_FILES['archivo']['name'];
		$nombreTmpArchivo = $_FILES['archivo']['tmp_name'];
		$ext = substr($nombreArchivo, strrpos($nombreArchivo, '.'));
		//return end(explode(".", $str));Otra forma de obtener la extension..
		//$dir = "photo/$nombreArchivo";

		if (in_array($ext, $formatos)) {			
			/*if ($_FILES['archivo']['size']<400000) {
				echo "Bien!!, tu archivo solo pesa: ".$_FILES['archivo']['size'];
			} else {
				echo "Solo se admiten archivos con un tamaño menor a 400kb tu archivo pesa: ".$_FILES['archivo']['size'];
			}*/

		include "../../php/config.php";
		$conexion = mysqli_connect($server,$user,$pass,$db);
        mysqli_set_charset($conexion, "utf8");
		$peticion = "SELECT CONCAT( nombre, '_', (SELECT count(*) FROM imagen WHERE proyecto_idproyecto = ".$_POST['idproyecto'].")) as 'file' FROM proyecto WHERE idproyecto = ".$_POST['idproyecto']." LIMIT 1";        
        $resultado = mysqli_query($conexion, $peticion);		
		
		while($fila = mysqli_fetch_array($resultado)){
			$nombreArchivo= $fila['file'];
		}
		$nombreArchivo = $nombreArchivo.$ext;

			if (move_uploaded_file($nombreTmpArchivo, "../../photo/$nombreArchivo")) {
				echo "  Archivo subido exitosamente.";

			    $peticion = "INSERT INTO imagen VALUES (null,
			       	'".$_POST['idproyecto']."',
			       	'".$nombreArchivo."', '', 0)";
			    $resultado = mysqli_query($conexion, $peticion);

				echo "
		        <script type='text/javascript'>
		            window.location='imagen_filtro.php?idproyecto=".$_POST['idproyecto']."';
		        </script>";

			} else {
				echo "  Ocurrio un error.";
			}				
		} else {
			echo "Formato de archivo Invalido..";
		}
		
	} else {
		// Aqui se debe retornar al panel "Imagen"
		echo "fallo";
	}
?>