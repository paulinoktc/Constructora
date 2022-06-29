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

  $peticion = 'SELECT * FROM admin WHERE idadmin = "'.$_POST['idadmin'].'" AND password = "'.md5($_POST['password']).'"';
  $resultado = mysqli_query($conexion, $peticion);
	
if (mysqli_num_rows($resultado) > 0) {
    if (trim($_POST['password1'])=="" AND trim($_POST['password2'])=="") {
      echo "password vacio";
      $peticion2 = 'UPDATE admin SET
                    nick = "'.$_POST['nick'].'", 
                    nombre = "'.$_POST['nombre'].' "
                    WHERE idadmin ='.$_POST['idadmin'];
      $resultado2 = mysqli_query($conexion, $peticion2); 
    } else {
      if ($_POST['password1']==$_POST['password2']) {
        $pass = md5($_POST['password1']);
        $peticion3 = 'UPDATE admin SET
                      nick = "'.$_POST['nick'].'", 
                      nombre = "'.$_POST['nombre'].'", 
                      password = "'.$pass.'" 
                      WHERE idadmin ='.$_POST['idadmin'];
        $resultado3 = mysqli_query($conexion, $peticion3);
      } else {
        echo "
          <script type='text/javascript'>
            alert('Verificar la nueva contraseña!');
          </script>";
      }      
    }
}else{
    echo "
        <script type='text/javascript'>
          alert('Verificar la contraseña actual!');
        </script>";
}
mysqli_close($conexion);     
?>
<script type='text/javascript'>
	window.location='usuario.php';
</script>

<?php 
/*
Autentificar al usuario con su id y password
Verificar que las nuevas contraseñas no esten vacias y sean iguales

        $peticion2 = 'UPDATE admin SET
                      nick = "'.$_POST['nick'].'", 
                      nombre = "'.$_POST['nombre'].'", 
                      password = "'.$_POST['password1'].'" 
                      WHERE idadmin ='.$_POST['idadmin'];
        $resultado2 = mysqli_query($conexion, $peticion2);   
*/
?>