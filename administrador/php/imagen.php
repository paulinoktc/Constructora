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
	<title>Gestion de Imagenes</title>
	<style type="text/css" media="screen">
		/*		Titulo en el interior de la lista 		*/
		*{
			font-family: Arial;
		}
		#titulo{
			text-align: center;
			color: white;
			margin: 5px 0 0 0;
			font-size: 12px;
			font-weight: 100;
		}
		#container div{
			float: left;
		}

		#lista_container{
			width: 120px;
			border-radius: 5px;
			border: 1px solid white; 
			background: url(../img/n70.png);
		}		
		#lista{
			list-style: none;
		/*	Altura de la lista en el interior del div...............................*/
			margin:5px;
			padding: 0 0 0 8px;
		}
		#lista li{
			background-image: url(../img/c02.png);
    		background-repeat: no-repeat;
    		background-position: 0px 6px; 
			padding: 0 0 5px 18px;
		}
		#lista li a{
			text-decoration: none;
			font-size: 14px;
			color: white;
		}
		#lista li a:hover{
			color: orange;
			padding-left: 3px;
			transition: all 0.30s;
		}
		#filtro{
			width: 800px;
		}
		iframe{
			width: 99.5%;
			height: 600px;
			border: none;
		}
	</style>
<script type="text/javascript">

	function enviar(valor){
		
	}

</script>	
</head>
<body>
<div id="container">
<div id="lista_container">
<h6 id="titulo">PROYECTOS</h6>
<ul id="lista">
<?php 
	$conexion = mysqli_connect($server,$user,$pass,$db);
	mysqli_set_charset($conexion, "utf8");
	$peticion = "SELECT idproyecto, nombre FROM proyecto";
	$resultado = mysqli_query($conexion, $peticion);
	     
	while($fila = mysqli_fetch_array($resultado)) {
		echo '<li><a href="imagen_filtro.php?idproyecto='.$fila['idproyecto'].'" target="frame_img">'.$fila['nombre'].'</a></li>';	
	}
	mysqli_close($conexion); 	
?>
</ul>
</div>

<div id="filtro">
	<iframe name="frame_img"></iframe>
</div>
</div>

</body>
</html>