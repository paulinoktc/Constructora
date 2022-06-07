<?php include "php/config.php" ?>

<!DOCTYPE html>
<html lang="es">
	<head>
		<title>JP's Inmuebles</title>
		<meta charset="utf-8">
		<link href='images/shortcut.png' rel='shortcut icon' type='image/png'>
		<link rel="stylesheet" href="css/reset.css" type="text/css" media="all">
		<link rel="stylesheet" href="css/style.css" type="text/css" media="all">
		<link rel="stylesheet" href="css/responsiveslides.css" type="text/css" media="all">
		<link rel="stylesheet" href="css/themes.css" type="text/css" media="all">
	</head>
	<body id="page1">
		<div class="wrap">
			<!-- header newsletter-form -->
			<header>
				<div class="container">
					<h1><a href="index.php">JP's Inmuebles</a></h1>
					
					<nav>
						<ul id="menu">
							<li class="current"><a href="index.php" class="nav1">Inicio</a></li>
							<li><a href="nosotros.php" class="nav2">Nosotros </a></li>
							<li><a href="" class="nav3">Creditos</a>
							
							<ul id="submenu">
								<li><a href="cr_infonavit.php">Infonavit</a></li>
								<li><a href="cr_fovissste.php">Fovissste</a></li>
								<li><a href="cr_banjercito.php">Banjercito</a></li>
								<li><a href="cr_bancario.php">Bancario</a></li>
							</ul>
						</li>
						<li><a href="proyectos.php" class="nav4">Proyectos</a></li>
						<li class="end"><a href="contacto.php" class="nav5">Contactanos</a></li>
					</ul>
				</nav>
				
				<div id="telefono"> <span>(789) 893 2824 </span> </div>
			</div>
		</header>
		<div class="container">

			<div class="rslides_container">
				<ul class="rslides">
				<?php  
					$conexion = mysqli_connect($server,$user,$pass,$db);
					mysqli_set_charset($conexion, "utf8");
					$peticion = "SELECT archivo, titulo FROM imagen WHERE presentacion = 1";
					$resultado = mysqli_query($conexion, $peticion);
					
					while($fila = mysqli_fetch_array($resultado)) {
						echo "\n"."<li><img src='photo/".$fila['archivo']."' alt=''><p class='caption'>".$fila['titulo']."</p></li>";
					}
					mysqli_close($conexion); 
				?>
				</ul>
			</div>

			
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

		</aside>
		<!-- content -->
		<section id="content">
			<div class="inside">
			
				<div class="descPrincipal">
					<h2>JP'S Inmuebles <span>Construyendo hogares</span></h2>	
					<div class="descPrincipal1">
						<h4>Historia</h4>
						<img src="images/jps_01.jpg">
						<p>Derivado de Central Mueblará Pacheco S.A. y ante la necesidad de ofertar viviendas tras haber amueblado durante 
						varios años los hogares de miles de familias. Gracias a la actitud emprendedora y el carácter de personas nace en 
						el año 2006 J.P´S Inmuebles en Tantoyuca, Ver.</p>
					</div>

					<div class="descPrincipal1">
						<h4>PORQUE CASAS JP'S</h4>
						<img src="images/jps_02.jpg">
						<p> Contamos con personal capacitado para el desarrollo de tu obra ya sea de pequeño o de gran tamaño, 
						los años de experiencia nos respaldan. Ofertamos diferentes tipos de creditos que facilitan la adquisiscion 
						de su hogar.</p>	
					</div>

					<div class="descPrincipal1">
						<h4>BIENVENIDOS A JP,S INMUEBLES</h4>
						<img src="images/jps_03.jpg">
						<p>J.P´S  está dedicada a la construcción y venta de inmuebles, dentro de la región huasteca. Implementar este 
						proyecto dentro de la empresa, nos traerá una mejora desde diseño hasta el resultado final que viene siendo la 
						entrega de los  inmuebles.</p>	
					</div>

				</div>

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
		<script type="text/javascript" src="js/cufon-yui.js"></script>
		<script type="text/javascript" src="js/cufon-replace.js"></script>
		<script type="text/javascript" src="js/Myriad_Pro_300.font.js"></script>
		<script type="text/javascript" src="js/Myriad_Pro_400.font.js"></script>
		<script type="text/javascript" src="js/script.js"></script>
		<script type="text/javascript" src="js/responsiveslides.min.js"></script>
<script type="text/javascript"> Cufon.now(); </script>
<script>
$(function() {
$(".rslides").responsiveSlides({
auto: true,             // Boolean: Animate automatically, true or false
speed: 800,            // Integer: Speed of the transition, in milliseconds
timeout: 4500,          // Integer: Time between slide transitions, in milliseconds
pager: false,           // Boolean: Show pager, true or false
nav: true,             // Boolean: Show navigation, true or false
random: true,          // Boolean: Randomize the order of the slides, true or false
pause: false,           // Boolean: Pause on hover, true or false
pauseControls: true,    // Boolean: Pause when hovering controls, true or false
prevText: "Atras",   // String: Text for the "previous" button
nextText: "Siguiente",       // String: Text for the "next" button
maxwidth: "",           // Integer: Max-width of the slideshow, in pixels
navContainer: "",       // Selector: Where controls should be appended to, default is after the 'ul'
manualControls: "",     // Selector: Declare custom pager navigation
namespace: "centered-btns",   // String: Change the default namespace used
before: function(){},   // Function: Before callback
after: function(){}     // Function: After callback
});
});
</script>
</body>
</html>