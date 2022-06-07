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
	<title>Noticias</title>
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
    var r = confirm("¿Desea eliminar esta Noticia?");
    return r;
  }
  
  function cargarForm(id){
    var fecha = document.getElementById('fecha'+id).textContent;
    var titulo = document.getElementById('titulo'+id).textContent;
    var descripcion = document.getElementById('descripcion'+id).textContent;     
    document.getElementById('idnoticia').value=id;
    document.getElementById('editFecha').value=fecha;
    document.getElementById('editTitulo').value=titulo;
    document.getElementById('editDescripcion').value=descripcion;
    document.getElementById("form_editar").style.display = "block";
  }
</script>
</head>

<body>

<h4 id="titulo">Noticias</h4>
<div class="divTabla">    
  <table>

        	<tr>
        		<td>Fecha</td>
        		<td>Titulo</td>
        		<td>Descripción</td>
        		<td>Editar</td>
        		<td>Eliminar</td>
        	</tr>

        <?php  
          $conexion = mysqli_connect($server,$user,$pass,$db);
          mysqli_set_charset($conexion, "utf8");
          $peticion = "SELECT * FROM noticia";
          $resultado = mysqli_query($conexion, $peticion);
            
          while($fila = mysqli_fetch_array($resultado)) {
          $id = $fila['idnoticia'];
          echo '
          	<tr>     
          		<td id="fecha'.$id.'">'.$fila['fecha'].'</td>
          		<td id="titulo'.$id.'">'.$fila['titulo'].'</td>          		
          		<td id="descripcion'.$id.'">'.$fila['descripcion'].'</td>
          		<td>
                <input type="submit" class="btn_editar" onclick="cargarForm('.$id.')" value="">
              </td>
          		<td>
                <a href="noticia_eliminar.php?idnoticia='.$id.'" onclick="return confirmar()">
                  <img src="../img/delete.png">
                </a>
              </td>
          	</tr>';}
          mysqli_close($conexion); 
        ?>
    </table>
</div>
<div id="divForm">
      <form id="form_agregar" class="form-container" action="noticia_agregar.php" method="POST">
        <div class="form-title"><h4>Agregar Noticia</h4></div>          
        <div class="form-title">Titulo</div>
        <input name="titulo" class="form-field" type="text" placeholder="Titulo" required>
        <div class="form-title">Descripción</div>
        <textarea name="descripcion" class="form-field" placeholder="Descripción" required></textarea>
          
        <div class="form-title">Fecha</div>
        <!-- <input name="fecha" class="form-field" type="date" placeholder="Fecha" autofocus required> -->
        <input name="fecha" class="date-pick" type="text" autofocus required readonly>

        <div class="submit-container">
          <input type="submit" id="submit" class="submit-button" value="Agregar">
        </div>
      </form>

      <form id="form_editar" class="form-container" action="noticia_editar.php" method="POST">
        <div class="form-title"><h4>Editar</h4></div>
          <input id="idnoticia" type="hidden" name="idnoticia" value="">
          <div class="form-title">Titulo</div>
          <input id="editTitulo" class="form-field" name="titulo" type="text" placeholder="Titulo" required>
          <div class="form-title">Descripción</div>
          <textarea id="editDescripcion" class="form-field" name="descripcion" placeholder="Descripción" required></textarea>

          <div class="form-title">Fecha</div>
          <input id="editFecha" class="date-pick" name="fecha" type="text" autofocus readonly required>

        <div class="submit-container">
          <input type="submit" id="submit" class="submit-button" value="Guardar">
          <input type="button" id="cancelar" class="submit-button" value="Cancelar" onclick="this.form.style.display='none'">
        </div>
      </form>
</div>
</body>

</html>