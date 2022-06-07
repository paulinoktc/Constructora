<?php 
	session_start();
	if (!isset($_SESSION['nombre'])) {
		header('Location: ../login.php');
	}	
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>JP'S - Admin</title>
	<link rel="icon" href="img/config1.png">	
	<link rel="stylesheet" href="css/estilos.css">
	<link rel="stylesheet" href="css/fluid_grid_16col.css">
	<script type="text/javascript" >
		function confirmar(){return confirm("¿Desea cerrar sesion?")}
  	</script>
</head>
<body>

	<header class="container_16">
		
		<div class="grid_3" id="header_left">
			<span><a href="index.php">Administrador</a></span>
		</div>

		<div class="grid_12 alpha" id="header_center">
			<p><?php echo "Bienvenido: ".$_SESSION['nombre']; ?></p>
		</div>
		
		<div class="grid_1 alpha" >
			<a href="php/cerrar_sesion.php" id="logout" onclick="return confirmar()" title="Cerrar Sesión"><span>Cerrar Sesión</span></a>
		</div>

	</header>

	<!--##### Contenido central del sitio #####-->
	<div class="container_16">
		
		<div class="grid_3">
			
			<ul class="lista">
				<h4>Gestionar</h4>
				<li><a href="php/proyecto.php" target="myFrame">Proyectos</a></li>
				<li><a href="php/noticia.php" target="myFrame">Noticias</a></li>
				<li><a href="php/usuario.php" target="myFrame">Usuarios</a></li>				
				<li><a href="php/imagen.php" target="myFrame">Imagenes</a></li>								
				<li><a href="php/presentacion.php" target="myFrame">Galeria</a></li>				
				<li><a href="php/mensaje.php" target="myFrame">Mensajes</a></li>
				<li><a href="php/bolsa.php" target="myFrame">Bolsa de trabajo</a></li>
			</ul>
		</div>

		<div class="grid_13 alpha">
			<div id="central">
				<iframe src="php/proyecto.php" name="myFrame"></iframe>
			</div>
		</div>

	</div>
	<!--##### TERMINA el contenido central del sitio #####-->

	<footer class="container_16">
		
		<div class="grid_16" id="pie">
			<p>JP'S Inmuebles Todos los derechos reservados</p>
		</div>

	</footer>
</body>
</html>