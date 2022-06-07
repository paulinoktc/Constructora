<?php include "php/config.php" ?>
<!DOCTYPE html>
<html lang="es">
<head>
<title>JP's Inmuebles</title>
<meta charset="utf-8">
<link href='images/shortcut.png' rel='shortcut icon' type='image/png'>
<meta name="description" content="Place your description here">
<meta name="keywords" content="put, your, keyword, here">
<meta name="author" content="Templates.com - website templates provider">
<link rel="stylesheet" href="css/reset.css" type="text/css" media="all">
<link rel="stylesheet" href="css/style.css" type="text/css" media="all">
<!--[if lt IE 7]>
     <link rel="stylesheet" href="css/ie/ie6.css" type="text/css" media="screen">
     <script type="text/javascript" src="js/ie_png.js"></script>
     <script type="text/javascript">
        ie_png.fix('.png, footer, header nav ul li a, .nav-bg, .list li img');
     </script>
<![endif]-->
<!--[if lt IE 9]>
  	<script type="text/javascript" src="js/html5.js"></script>
  <![endif]-->
</head>
<body id="page2">
<div class="wrap"> 
  <!-- header -->
  <header>
    <div class="container">
      <h1><a href="index.php">JP'S Inmuebles</a></h1>
          <nav>
            <ul id="menu">
              <li><a href="index.php" class="nav1">Inicio</a></li>
              <li><a href="nosotros.php" class="nav2">Nosotros </a></li>
              <li class="current"><a href=""class="nav3">Creditos</a>
                

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
      <div id="telefono"><span>(789) 893 2824</span></div>
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
        
        <h2>Credito<span> Bancario</span></h2>
        
        <div class="img-box"><img src="images/banco.png"><span class="txt1">¿Cuando solicitar un credito Bancario?</span> 
        <p>Cuando se es trabajador independiente y no se cuenta con algun tipo de seguro.</p>
        <p>Cuando se cuenta con un tipo de credito por parte de su trabajo pero dicho credito es insuficiente para solventar el costo de una vivienda.</p>
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
<script type="text/javascript"> Cufon.now(); </script>
</body>
</html>
