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
    var r = confirm("¿Desea eliminar a este usuario?");
    return r;
   }
  function cargarForm(id){
    document.getElementById('idadmin').value=id;
    document.getElementById('nick').value = document.getElementById('nick'+id).textContent;
    document.getElementById('nombre').value = document.getElementById('nombre'+id).textContent;
    document.getElementById("form_editar").style.display = "block";
  }

  function ocultar(obj){
    obj.style.display = "none";
  }    
</script>
</head>
<body>

<h4>Usuarios:</h4>
<div class="divTabla">
	<table>
        	<tr>
        		<td>ID</td>
            <td>Nick</td>
        		<td>Nombre</td>
        		<td>Editar</td>
        		<td>Eliminar</td>
        	</tr>
        <?php  
          $conexion = mysqli_connect($server,$user,$pass,$db);
          mysqli_set_charset($conexion, "utf8");
          $peticion = "SELECT * FROM admin";
          $resultado = mysqli_query($conexion, $peticion);
            
          while($fila = mysqli_fetch_array($resultado)) {
          $id=$fila['idadmin'];
          echo '
          	<tr>
             	<td>'.$id.'</td>     
              <td id="nick'.$id.'">'.$fila['nick'].'</td>             
              <td id="nombre'.$id.'">'.$fila['nombre'].'</td>
              	<td>
                	<input type="submit" class="btn_editar" onclick="cargarForm('.$id.')" value="" title="Editar">
              	</td>
          		<td>
          			<a href="usuario_eliminar.php?idadmin='.$id.'" onclick="return confirmar()">
          				<img src="../img/delete.png" title="Eliminar">
          			</a>
          		</td>
          	</tr>';
          }
          mysqli_close($conexion); 
        ?>
    </table>
</div>
<div id="divForm">
<form id="form_agregar" class="form-container" action="usuario_agregar.php" method="POST">
  <div class="form-title"><h4>Agregar Usuario</h4></div>

        <div class="form-title">Nick</div>
        <input name="nick" class="form-field" type="text" placeholder="Nick" autofocus required>   
        <div class="form-title">Nombre</div>
        <input name="nombre" class="form-field" type="text" placeholder="Nombre" required>
        <div class="form-title">Contraseña</div>
        <input name="password" class="form-field" type="password" required>
        <div class="form-title">Confirmar contraseña</div>
        <input name="password2" class="form-field" type="password" required>
        <div class="submit-container">
          <input type="submit" id="submit" class="submit-button" value="Agregar">
        </div>
</form>

<form id="form_editar" class="form-container" action="usuario_editar.php" method="POST">
  <div class="form-title"><h4>Editar Usuario</h4></div>
        <input id="idadmin" type="hidden" name="idadmin" value="">

        <div class="form-title">Nick</div>
        <input id="nick" name="nick" class="form-field" type="text" placeholder="Nick" autofocus required>
        <div class="form-title">Nombre</div>        
        <input id="nombre" name="nombre" class="form-field" type="text" placeholder="Nombre" required>

        <div class="form-title">Contraseña Actual</div>        
        <input id="password" name="password" class="form-field" type="password" required>
        <div class="form-title">Nueva contraseña</div>        
        <input id="password" name="password1" class="form-field" type="password">
        <div class="form-title">Confirmar Nueva contraseña</div>        
        <input id="password" name="password2" class="form-field" type="password">
                        
        <div class="submit-container">
          <input type="submit" id="submit_editar" class="submit-button" value="Guardar">
          <input type="button" id="cancelar" class="submit-button" value="Cancelar" onclick="this.form.style.display='none'">
        </div>
</form>
</div>
</body>
</html>