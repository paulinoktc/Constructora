<?php 
  session_start();
  if (!isset($_SESSION['nombre'])) {
    header('Location: ../../login.php');
  } 
 ?>
<?php
	if ($_POST['password']==$_POST['password2']) {
		include "../../php/config.php";
		$conexion = mysqli_connect($server,$user,$pass,$db);
	    mysqli_set_charset($conexion, "utf8");
		
	    $pass = md5($_POST['password']);

	    $peticion = "INSERT INTO admin VALUES (null,
	       	'".$_POST['nick']."',
	       	'".$_POST['nombre']."',       	
	      	'".$pass."')";

		$estado = mysqli_query($conexion, $peticion);
		if (!$estado) {
		echo "
			<script type='text/javascript'>				
				alert('Fallo la insercción..');
			</script>";
		}		
	    mysqli_close($conexion);
	} else {
		echo "
			<script type='text/javascript'>
				alert('No coinciden las contraseñas!');
			</script>";			
	}
?>
<script type='text/javascript'>
	window.location='usuario.php';
</script>