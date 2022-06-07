<?php 
	session_start();
	if (!isset($_SESSION['nombre'])) {

		include "config.php";

		if (isset($_POST['user']) && isset($_POST['pass'])) {
			# code...
		$conexion = mysqli_connect($server, $user, $pass, $db);

		$usuario = mysql_real_escape_string($_POST['user']);
		$contrasena = mysql_real_escape_string($_POST['pass']);
		$peticion = "SELECT * FROM admin WHERE nick='".$usuario."' AND password ='".md5($contrasena)."'";
		/*		
		echo $_POST['user'];
		echo $_POST['pass'];		
		echo $usuario;
		echo $contrasena."<br>";
		echo $peticion;
		*/
		$resultado = mysqli_query($conexion, $peticion);			
			if ($fila = mysqli_fetch_array($resultado)) {

				session_start();

				$_SESSION['nombre'] = $fila['nombre'];
				mysqli_close($conexion);

				header('Location: ../administrador/index.php');

			} else {							
				echo '<script type="text/javascript">
						alert("Usuario o password Incorrectos");
						window.location = "../login.php";
					  </script>';
			}			
		}		
	}else{
		header('Location: ../administrador/index.php');
	}	
 ?>




<?php
/*
	include "config.php";

	if (isset($_POST['user']) && isset($_POST['pass'])) {
		# code...
	$conexion = mysqli_connect($server, $user, $pass, $db);

	$usuario = mysql_real_escape_string($_POST['user']);
	$contrasena = mysql_real_escape_string($_POST['pass']);
	$peticion = "SELECT * FROM admin WHERE nombre='".$usuario."' AND password ='".$contrasena."'";
	$resultado = mysqli_query($conexion, $peticion);

		if ($fila = mysqli_fetch_array($resultado)) {

			session_start();

			$_SESSION['nombre'] = $fila['nombre'];
			$_SESSION['password'] = $fila['password'];
			mysqli_close($conexion);

			header('Location: ../administrador/index.php');

		} else {
			echo '
				<script type="text/javascript">
					alert("Usuario o password Incorrectos");
					window.location = "../login.php";
				</script>
			';
		}
	}	
*/	
?>

