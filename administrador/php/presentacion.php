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
	<title>Presentacion</title>

  <style type="text/css">
    *{color:white}
    #titular{
      background: url("../img/n60.png");
      text-align: center;
      font-weight: 100;
      padding: 3px 0 3px 0;
    }
    .img-container{
      border: 1px solid white;
      background: url("../img/n60.png"); 
      width: 200px;
      padding: 12px 12px 2px 12px;
      margin: 7px;
      float: left;
    }
    img{
      width: 200px;
      height: 150px;
    }
  </style>

<script type="text/javascript">
	function actualizar(checkbox){
		var idimagen = checkbox.name;

		if (checkbox.checked) {
			var presentacion = 1;
		} else{
			var presentacion = 0;
		};
		window.location="presentacion_actualizar.php?idimagen="+idimagen+"&presentacion="+presentacion;
	}
</script>	
</head>
<body>
<h4 id="titular">Las imagenes marcadas, son las que se muestran dentro la galeria de la pagina "Inicio"</h4>
<div>
        <?php  
          $conexion = mysqli_connect($server,$user,$pass,$db);
          mysqli_set_charset($conexion, "utf8");
          $peticion = "SELECT * FROM imagen ORDER BY presentacion DESC";
          $resultado = mysqli_query($conexion, $peticion);
          
          while($fila = mysqli_fetch_array($resultado)) {
          
          echo '<div class="img-container">
                <img src="../../photo/'.$fila['archivo'].'">
                <label>Imagen visible:</label><input type="checkbox" name="'.$fila['idimagen'].'"';
                if ($fila['presentacion']==1) {
                  echo " checked";
                }
          echo ' onclick="actualizar(this)"></div>';
          }

          mysqli_close($conexion); 
        ?>
</div>
</body>
</html>