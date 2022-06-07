<?php 
  session_start();
  if (!isset($_SESSION['nombre'])) {
    header('Location: ../../login.php');
  } 
 ?>
<?php include "../../php/config.php" ?>


<?php
  $conexion = mysqli_connect($server,$user,$pass,$db);
  mysqli_set_charset($conexion, "utf8");
  $peticion = "UPDATE imagen SET presentacion = '".$_GET['presentacion']."' WHERE idimagen=".$_GET['idimagen']."";
  $resultado = mysqli_query($conexion, $peticion);
  mysqli_close($conexion);
?>
<script type="text/javascript">
  window.location="presentacion.php";
</script>