<?php 
	session_start();
	if (!isset($_SESSION['nombre'])) {
		header('Location: ../login.php');
	}	
?>
<?php include "../../php/config.php" ?>
 <!DOCTYPE html>
<html>
<head>
	<title>Imagenes</title>
  	<link rel="stylesheet" href="../css/tabla.css">
<style type="text/css" media="screen">
 	body{margin: 0 20px 0 20px}
 	a{
 		text-decoration: none;
 		color: black;
 	}
</style>
<script type="text/javascript">
  function confirmar(){
    var r = confirm("¿Desea eliminar este Registro?");
    return r;
  }
</script>	
</head>
<body>

      <?php  
		      $conexion = mysqli_connect($server,$user,$pass,$db);
          mysqli_set_charset($conexion, "utf8");
          $peticion = "SELECT * FROM bolsatrabajo";
          $resultado = mysqli_query($conexion, $peticion);

          if (mysqli_num_rows($resultado)>0) {
          	
          	$url = "../../curriculum/";
            
            echo "<div class='divTabla'>
                  <table>
                   <tr>
                    <td>ID</td>
                    <td>Nombre</td>
                    <td>Apellidos</td>
                    <td>Telefono</td>
                    <td>eMail</td>
                    <td>Comentario</td>
                    <td>Curriculum</td>                    
                    <td>Eliminar</td>
                   </tr>";
            while($fila = mysqli_fetch_array($resultado)) {
            $id = $fila['idbolsatrabajo'];
            echo '
              <tr>     
                <td class="id">'.$id.'</td>                                     
                <td>'.$fila['nombre'].'</td>
                <td>'.$fila['apellidos'].'</td>
                <td>'.$fila['telefono'].'</td>
                <td>'.$fila['email'].'</td>
                <td>'.$fila['comentario'].'</td>

                <td>
                  <a href="'.$url.$fila['curriculum'].'" target="blank">                
                    Ver
                  </a>
                </td>

                <td>
                  <a href="bolsa_eliminar.php?idbolsatrabajo='.$id.'" onclick="return confirmar()">                
                    <img src="../img/delete.png">
                  </a>
                </td>

              </tr>';
            }
            echo "</table>
                </div>";
          } else {
            echo "<label class='info'>Actualmente no existen solicitudes.</label>";
          }
          mysqli_close($conexion);         		
      ?>
</body>
</html>