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
  form{
    margin: 0 0 5px 0;
    background: url(../img/n60.png);
    padding: 3px;
    border-radius: 6px;
    text-align: center;
  }
  label{
    color: white;
  }
  .inputFile{
    color: white;
  }
  .info{
    background: url(../img/n60.png);
    border-radius: 10px;
    padding: 3px 10px 5px 10px;
  }
  .enviar{
    color: black;
  }
  .proyecto_img{
		width: 150px;
		height: 100px;
	}
	</style>
<script type="text/javascript">
  function actualizar(titulo){
      var idimagen = ((titulo.parentNode).parentNode).cells[0].textContent;
      window.location="imagen_editar.php?idimagen="+idimagen+"&"+"titulo="+titulo.value;
  }
  function confirmar(){
    var r = confirm("¿Desea eliminar esta Imagen?");
    return r;
  }
</script>	
</head>
<body>


<form method="post" action="imagen_subir.php" enctype="multipart/form-data">
  <label>Agregar Imagen al proyecto</label>
  <input type="file" class="inputFile" name="archivo" required>
  <?php  echo '<input type="hidden" name="idproyecto" value="'.$_GET['idproyecto'].'">';?>
  <input type="submit" class="enviar" name="submit" value="Guardar">
</form>
      <?php  
        if ($_GET) {

		      $conexion = mysqli_connect($server,$user,$pass,$db);
          mysqli_set_charset($conexion, "utf8");
          $idproyecto = $_GET['idproyecto'];
          $peticion = "SELECT * FROM imagen WHERE proyecto_idproyecto=".$idproyecto;
          $resultado = mysqli_query($conexion, $peticion);

          if (mysqli_num_rows($resultado)>0) {
            echo "<div class='divTabla'>
                  <table>
                   <tr>
                    <td>ID</td>
                    <td>Imagen</td>
                    <td>Titulo</td>
                    <td>Eliminar</td>
                   </tr>";
            while($fila = mysqli_fetch_array($resultado)) {
            $id = $fila['idimagen'];
            echo '
              <tr>     
                <td class="id">'.$id.'</td>         
                <td id="archivo'.$id.'"><img src="../../photo/'.$fila['archivo'].'" class="proyecto_img"></td>
                <td id="titulo'.$id.'"><input type="text" name="" value="'.$fila['titulo'].'" onchange="actualizar(this)"></td>
                <td>
                  <a href="imagen_eliminar.php?idimagen='.$id.'&idproyecto='.$idproyecto.'" onclick="return confirmar()">                
                    <img src="../img/delete.png">
                  </a>
                </td>
              </tr>';
            }
            echo "</table>
                </div>";
          } else {
            echo "<label class='info'>Aun no se han agregado imagenes a este proyecto.</label>";
          }
          mysqli_close($conexion);         		
        }
      ?>
</body>
</html>