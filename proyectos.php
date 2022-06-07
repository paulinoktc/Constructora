<?php include "php/config.php" ?>

<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="utf-8">
		<title>JP's Inmuebles</title>
		<link href='images/shortcut.png' rel='shortcut icon' type='image/png'>
		<meta name="description" content="Place your description here">
		<meta name="keywords" content="put, your, keyword, here">
		<meta name="author" content="Templates.com - website templates provider">
		<link rel="stylesheet" href="css/reset.css" type="text/css" media="all">
		<link rel="stylesheet" href="css/style.css" type="text/css" media="all">
		<link rel="stylesheet" type="text/css" href="js/colorbox/colorbox.css">	
	</head>
	<body id="page3">
		<div class="wrap">
			<!-- header -->
			<header>
				<div class="container">
					<h1><a href="index.php">JP'S Inmuebles</a></h1>
					<nav>
						<ul id="menu">
							<li><a href="index.php" class="nav1">Inicio</a></li>
							<li><a href="nosotros.php" class="nav2">Nosotros </a></li>
							<li><a href="" class="nav3">Creditos</a>
							
							<ul id="submenu">
								<li><a href="cr_infonavit.php">Infonavit</a></li>
								<li><a href="cr_fovissste.php">Fovissste</a></li>
								<li><a href="cr_banjercito.php">Banjercito</a></li>
								<li><a href="cr_bancario.php">Bancario</a></li>
							</ul>
						</li>
						<li class="current"><a href="proyectos.php" class="nav4">Proyectos</a></li>
						<li class="end"><a href="contacto.php" class="nav5">Contactanos</a></li>
					</ul>
				</nav>
				<div id="telefono"> <span>(789) 893 2824 </span> </div>
			</div>
		</header>
		<div class="container">
			<!-- aside -->
			<aside>
				<h3>Bienvenido</h3>
				<ul class="categories">
					<li><span><a href="proyectos.php">Proyectos</a></span></li>
					<li><span><a href="#">Tipos de Credito</a></span>
					<ul class="subcategoria">
						<li><span><a href="cr_infonavit.php">Infonavit</a></span></li>
						<li><span><a href="cr_fovissste.php">Fovissste</a></span></li>
						<li><span><a href="cr_banjercito.php">Banjercito</a></span></li>
						<li><span><a href="cr_bancario.php">Credito Bancario</a></span></li>
					</ul>
				</li>				
				<li><span><a href="bolsa_trabajo.php">Bolsa de Trabajo</a></span></li>
			</ul>

      <h2>Notas <span>Recientes</span></h2>           	
      <ul class="news">
		<?php  
			$conexion = mysqli_connect($server,$user,$pass,$db);
			mysqli_set_charset($conexion, "utf8");
			$peticion = "SELECT titulo, fecha, descripcion FROM noticia ORDER BY fecha DESC";
			$resultado = mysqli_query($conexion, $peticion);
				
			while($fila = mysqli_fetch_array($resultado)) {
			echo "
		        <li><strong>".$fila['fecha']."</strong>
		          <h4>".$fila['titulo']."</h4>
		          ".$fila['descripcion']."</li>";
			}
			mysqli_close($conexion); 
		?>        
      </ul>    
	
		</aside>		
		<!-- content -->
		<section id="content">
			<div class="inside">
				<h2>Nuestros Proyectos</h2>
				<ul class="articles">

				<?php
					$conexion = mysqli_connect($server,$user,$pass,$db);
					mysqli_set_charset($conexion, "utf8");

					$peticion = "SELECT * FROM proyecto";					
					$resultado = mysqli_query($conexion, $peticion);
					
					$ctaGrupo = 0;
					
					while($fila = mysqli_fetch_array($resultado)) {
					$ctaGrupo++;
					echo"
					<li>						
						<h4>".$fila['nombre']."</h4>
						<div class='descripcion'>
							<ul>
								<li>Ubicación: ".$fila['ubicacion']."</li>
								<li>Dimesiones: ".$fila['dimensiones']."</li>
								<li>Obra concluida el ".$fila['fechaTermino']."</li>								
							</ul>
							<ul class='descripcion-img'>
							";
					
					$peticion2 = "SELECT archivo, titulo FROM imagen WHERE proyecto_idproyecto = ".$fila['idproyecto'];					
					$resultado2 = mysqli_query($conexion, $peticion2);
					
					while($fila2 = mysqli_fetch_array($resultado2)) {
					echo "													
								<li><a class='grupo".$ctaGrupo."' href='photo/".$fila2['archivo']."' title='".$fila2['titulo']."'><span>imagen</span></a></li>";
					}

					echo "
							</ul>
						</div>
					</li>";					


					}

					mysqli_close($conexion); 
				?>

				</ul>
			</div>
		</section>
	</div>
</div>
<!-- footer -->
<footer>
	<div class="container">
		<div id="social">
			<a target="_blank" href="https://www.facebook.com/inmobiliaria.construyendohogares" id="social_fb">
				<span>facebook</span>
			</a>
			<a href="#" id="social_tw">
				<span>twitter</span>
			</a>
		</div>
		
		<div id="referencias">
			<a href="mapaSitio.php">Mapa del sitio</a>
			<a href="login.php">Intranet</a>	
			<a href="contacto.php">Contactanos</a>
		</div>
		
		<div id="copyright">
			<span>© 2014 JP'S Inmuebles S.A de C.V. Todos los Derechos Reservados</span>
		</div>
	</div>
</footer>
		<script type="text/javascript" src="js/jquery-1.9.0.min.js" ></script>
		<script type="text/javascript" src="js/colorbox/colorbox.js"></script>
		<script type="text/javascript" src="js/cufon-yui.js"></script>
		<script type="text/javascript" src="js/cufon-replace.js"></script>
		<script type="text/javascript" src="js/Myriad_Pro_300.font.js"></script>
		<script type="text/javascript" src="js/Myriad_Pro_400.font.js"></script>
		<script type="text/javascript" src="js/script.js"></script>	
<script type="text/javascript"> Cufon.now(); </script>
<script>
	$(document).ready(function(){
		<?php
			for ($i=1; $i<=$ctaGrupo; $i++) {
				echo "$('.grupo".$i."').colorbox({rel:'grupo".$i."'});";
			}
		?>
	});	
</script>
</body>
</html>