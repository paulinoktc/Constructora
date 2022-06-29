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
          
  //obtener nombre de la imagen          
    $peticion = "SELECT archivo FROM imagen WHERE idimagen = ".$_GET['idimagen'];
    
    echo $peticion;

    $resultado = mysqli_query($conexion, $peticion);
    while($fila = mysqli_fetch_array($resultado)) {
      $archivo = $fila['archivo'];
    } 


    $peticion2 = "DELETE FROM imagen WHERE idimagen = ".$_GET['idimagen'];
    $resultado2 = mysqli_query($conexion, $peticion2);

    if ($resultado2) {
      unlink("../../photo/$archivo");
      
      echo "
        <script type='text/javascript'>
          window.location='imagen_filtro.php?idproyecto=".$_GET['idproyecto']."';
        </script>";

    } else {
      echo "Error, no se pudo eliminar el registro de la BD.";
    }    
    mysqli_close($conexion);     
?>