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
	<title>Proyectos</title>
  <link rel="stylesheet" href="../css/tabla.css">

  <link rel="stylesheet" href="../css/datePicker.css">
  <script src="../../js/jquery-1.9.0.min.js" type="text/javascript"></script>
  <script src="../js/date.js" type="text/javascript"></script> 
  <script src="../js/jquery.datePicker.js" type="text/javascript"></script>

  <script type="text/javascript">
  $(function()
  {
    Date.format = 'yyyy/mm/dd';
    $('.date-pick').datePicker({startDate:'01/01/1996'});
  });

  function confirmar(){
    var r = confirm("¿Desea eliminar este registro?");
    return r;
  }

  function cargarForm(id){
    document.getElementById('idproyecto').value=id;
    document.getElementById('nombre').value = document.getElementById('nombre'+id).textContent;
    document.getElementById('ubicacion').value = document.getElementById('ubicacion'+id).textContent;
    document.getElementById('costo').value = document.getElementById('costo'+id).textContent;
    document.getElementById('dimensiones').value = document.getElementById('dimensiones'+id).textContent;
    document.getElementById('fechaTermino').value = document.getElementById('fechaTermino'+id).textContent;
    
    document.getElementById("form_editar").style.display = "block";
  }

  function ocultar(obj){
      obj.style.display = "none";
  }
  
  function validarNumeros(e) { // 1
    tecla = (document.all) ? e.keyCode : e.which; // 2
    if (tecla==8) return true; // backspace
    if (tecla>=96 && tecla<=105) { return true;} //numpad

    patron = /[0-9]/; // patron
 
    te = String.fromCharCode(tecla);
    return patron.test(te); // prueba
  }  
</script>

</head>
<body>
<h4>Gestion de Proyectos:</h4>
<div class="divTabla">
	<table>

        	<tr>
        		<td>ID</td>
        		<td>Nombre</td>
        		<td>Ubicación</td>
        		<td>Costo</td>
        		<td>Dimensiones</td>
            <td>Obra terminada</td>
            <td>Editar</td>
            <td>Eliminar</td>
        	</tr>

        <?php  
          $conexion = mysqli_connect($server,$user,$pass,$db);
          mysqli_set_charset($conexion, "utf8");
          $peticion = "SELECT * FROM proyecto";
          $resultado = mysqli_query($conexion, $peticion);
            
          while($fila = mysqli_fetch_array($resultado)) {
          $id = $fila['idproyecto'];
          echo '
          	<tr>     
          		<td>'.$id.'</td>     		
          		<td id="nombre'.$id.'">'.$fila['nombre'].'</td>          		
          		<td id="ubicacion'.$id.'">'.$fila['ubicacion'].'</td>
              <td id="costo'.$id.'">'.$fila['costo'].'</td>
              <td id="dimensiones'.$id.'">'.$fila['dimensiones'].'</td>
              <td id="fechaTermino'.$id.'">'.$fila['fechaTermino'].'</td>
              <td>
                <input type="submit" class="btn_editar" onclick="cargarForm('.$id.')" value="">
              </td>
          		<td>
                <a href="proyecto_eliminar.php?idproyecto='.$id.'" onclick="return confirmar()">                
                  <img src="../img/delete.png">
                </a>
              </td>
          	</tr>';

          }
          mysqli_close($conexion); 
        ?>
    </table>
</div>
<div id="divForm">
<form id="form_agregar" class="form-container" action="proyecto_agregar.php" method="POST">
    <div class="form-title"><h4>Agregar Proyecto</h4></div>

        <div class="form-title">Nombre</div>
        <input name="nombre"  class="form-field" type="text" placeholder="Nombre" autofocus required>
        <div class="form-title">Ubicación</div>
        <input name="ubicacion"  class="form-field" type="text" placeholder="Ubicación" required>
        <div class="form-title">Costo</div>
        <input name="costo"  class="form-field" type="text" placeholder="Costo" onkeydown="return validarNumeros(event)" required>
        <div class="form-title">Dimensiones en Mts^2</div>
        <input name="dimensiones"  class="form-field" type="text" placeholder="Dimensiones" onkeydown="return validarNumeros(event)" required>
        <div class="form-title">Obra terminada:</div>
        <input name="fechaTermino"  class="date-pick" type="text" readonly required>
    <div class="submit-container">
      <input type="submit" id="submit" class="submit-button" value="Agregar">
    </div>
</form>

<form id="form_editar" class="form-container" action="proyecto_editar.php" method="POST">
        <div class="form-title"><h4>Editar</h4></div>
        <input id="idproyecto" type="hidden" name="idproyecto" value="">

        <div class="form-title">Nombre</div>
        <input id="nombre"  class="form-field" name="nombre" type="text" placeholder="Nombre" autofocus required> 
        <div class="form-title">Ubicación</div>
        <input id="ubicacion"  class="form-field" name="ubicacion" type="text" placeholder="Ubicación" required>
        <div class="form-title">Costo</div>
        <input id="costo"  class="form-field" name="costo" type="text" placeholder="Costo" onkeydown="return validarNumeros(event)" required>
        <div class="form-title">Dimensiones en Mts^2</div>
        <input id="dimensiones"  class="form-field" name="dimensiones" type="text" onkeydown="return validarNumeros(event)" placeholder="Dimensiones" required>
        <div class="form-title">Obra terminada:</div>
        <input id="fechaTermino"  class="date-pick" name="fechaTermino" type="text" readonly required>

    <div class="submit-container">
        <input type="submit" id="submit_editar" class="submit-button" value="Guardar" onclick="ocultar(this.form)">
        <input type="button" id="cancelar" class="submit-button" value="Cancelar" onclick="this.form.style.display='none'">
    </div>
</form>
</div>
</body>
</html>