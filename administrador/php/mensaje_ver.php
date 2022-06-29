<?php 
	session_start();
	if (!isset($_SESSION['nombre'])) {
		header('Location: ../login.php');
	}	
 ?>
<?php include "../../php/config.php" ?>
 <!DOCTYPE html>
<html>
<head>
	<title>Ver Mensaje</title>
	<style type="text/css" media="screen">
	*{
		color:white;
		font-family: Arial;
	}
	p{margin: 0 0 15px 0}
	#container{
		background: url(../img/n60.png);
		padding:20px;
		border-radius: 15px;
	}
	a{
		padding: 2px 5px 2px 5px;
		margin-right: 10px;
		text-decoration: none;
		border: solid 1px white;
		border-radius: 5px;
	}
	a:hover{color: orange}
	</style>
	<script type="text/javascript">

	</script>	
</head>
<body>
<div id="container">
<?php
	
	$conexion = mysqli_connect($server,$user,$pass,$db);
	mysqli_set_charset($conexion, "utf8");

if (isset($_GET['idmensaje'])) {
	$peticion = "SELECT * FROM mensaje where idmensaje=".$_GET['idmensaje'];
	$resultado = mysqli_query($conexion, $peticion);
	     
	while($fila = mysqli_fetch_array($resultado)) {
		echo '<p>De: '.$fila['nombre'].'</p>';
		echo '<p>email: '.$fila['email'].'</p>';
		echo '<p>Telefono: '.$fila['telefono'].'</p>';
		echo '<p>Mensaje: '.$fila['mensaje'].'</p>';
	}
	echo "<a href='mensaje_ver.php?id=".$_GET['idmensaje']."'>Leido</a>
		  <a href='mensaje.php'>Regresar</a>";
}

	if (isset($_GET['id'])) {
		$peticion2 = "UPDATE mensaje SET verificado = 1 WHERE idmensaje =".$_GET['id'];
		echo $peticion2;
		$resultado2 = mysqli_query($conexion, $peticion2);
		header("Location: mensaje.php");
	}
	mysqli_close($conexion); 
?>
</div>
</body>
</html>