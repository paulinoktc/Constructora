<?php 
  session_start();
  if (!isset($_SESSION['nombre'])) {
    header('Location: ../../login.php');
  } 
 ?>
<?php  
	include "../../php/config.php";
	$conexion = mysqli_connect($server,$user,$pass,$db);
    mysqli_set_charset($conexion, "utf8");
          
    $peticion = "INSERT INTO noticia VALUES (null,
       	'".$_POST['titulo']."',
       	'".$_POST['fecha']."',
      	'".$_POST['descripcion']."')";

    $resultado = mysqli_query($conexion, $peticion);
    mysqli_close($conexion);     
?>
<script type='text/javascript'>
	window.location='noticia.php';
</script>