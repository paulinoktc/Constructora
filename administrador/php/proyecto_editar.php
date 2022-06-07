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
          
    $peticion = 'UPDATE proyecto SET 
                  nombre = "'.$_POST['nombre'].'", 
                  ubicacion = "'.$_POST['ubicacion'].'", 
                  costo = "'.$_POST['costo'].'",
                  dimensiones = "'.$_POST['dimensiones'].'",
                  fechaTermino = "'.$_POST['fechaTermino'].'" 
                  WHERE idproyecto ='.$_POST['idproyecto'];

    $resultado = mysqli_query($conexion, $peticion);
    mysqli_close($conexion);     
?>
<script type='text/javascript'>
  window.location='proyecto.php';
</script>