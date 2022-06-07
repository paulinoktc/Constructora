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
    echo $_GET['idbolsatrabajo'];
    $peticion = "SELECT curriculum FROM bolsatrabajo WHERE idbolsatrabajo = ".$_GET['idbolsatrabajo'];

    $resultado = mysqli_query($conexion, $peticion);
      while($fila = mysqli_fetch_array($resultado)) {
      $archivo = $fila['curriculum'];
    } 

    // Eliminar registro de la db
    $peticion2 = "DELETE FROM bolsatrabajo WHERE idbolsatrabajo = ".$_GET['idbolsatrabajo'];
    $resultado2 = mysqli_query($conexion, $peticion2);

    if ($resultado2) {
      unlink("../../curriculum/$archivo");
      
      echo "
        <script type='text/javascript'>
          window.location='bolsa.php';
        </script>";

    } else {
      echo "Error, no se pudo eliminar el registro de la BD.";
    }    
    mysqli_close($conexion);     
?>