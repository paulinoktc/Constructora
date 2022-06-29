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
          
    $peticion = 'UPDATE imagen SET 
                  titulo = "'.$_GET['titulo'].'"
                  WHERE idimagen ='.$_GET['idimagen'];

    $resultado = mysqli_query($conexion, $peticion);
    $peticion2 = 'SELECT proyecto_idproyecto FROM imagen WHERE idimagen ='.$_GET['idimagen'];
    $resultado2 = mysqli_query($conexion, $peticion2);
    while($fila = mysqli_fetch_array($resultado2)) {
      $idproyecto = $fila['proyecto_idproyecto'];
    }    
    mysqli_close($conexion);
    echo "
          <script type='text/javascript'>
            window.location='imagen_filtro.php?idproyecto=".$idproyecto."';
          </script>
    ";
?>

