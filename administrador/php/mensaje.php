<?php 
  session_start();
  if (!isset($_SESSION['nombre'])) {
    header('Location: ../../login.php');
  } 
 ?>
<?php include "../../php/config.php" ?>
<!DOCTYPE html>
<html>
<head>
	<title>Mensajes</title>
  <link rel="stylesheet" href="../css/tabla.css">  
  <script type="text/javascript">
    function confirmar(){
      var r = confirm("¿Desea eliminar este registro?");
      return r;
    }
</script>
</head>
<body>

<h4>Mensajes</h4>
<div class="divTabla">
	<table>
        	<tr>
        		<td>Fecha</td>
            <td>Nombre</td>
            <td>Telefono</td>
        		<td>email</td>
        		<td>Mensaje</td>
        		<td>Msj Leido</td>
            <td>Ver Msj</td>
        		<td>Eliminar</td>
        	</tr>
        <?php  
          $conexion = mysqli_connect($server,$user,$pass,$db);
          mysqli_set_charset($conexion, "utf8");
          $peticion = "SELECT * FROM mensaje ORDER BY idmensaje DESC";
          $resultado = mysqli_query($conexion, $peticion);
            
          while($fila = mysqli_fetch_array($resultado)) {
          $id=$fila['idmensaje'];
          echo '
          	<tr>
              <td>'.$fila['fecha'].'</td>     
          		<td>'.$fila['nombre'].'</td>     		
          		<td>'.$fila['telefono'].'</td>
              <td>'.$fila['email'].'</td>           		
          		<td>'.$fila['mensaje'].'</td>'; 

              if ($fila['verificado'] == 0) {
                echo "<td><img src='../img/no.png'></td>";
              } else {
                echo "<td><img src='../img/yes.png'></td>";
              }              
              echo '
              <td><a href="mensaje_ver.php?idmensaje='.$id.'"><img src="../img/ver.png"></a></td>
          		<td><a href="mensaje_eliminar.php?idmensaje='.$id.'" onclick="return confirmar()"><img src="../img/delete.png"></a></td>
          	</tr>';
          }
          mysqli_close($conexion); 
        ?>
    </table>
</div>
</body>
</html>