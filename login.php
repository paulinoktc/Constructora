<?php 
	session_start();
	if (!isset($_SESSION['nombre'])) {
		echo '
				<!DOCTYPE html>
				<html>
				<head>
				<meta charset="utf8">
				<title>JP\'S Admin-Login</title>
				<link rel="stylesheet" href="css/form.css">
				</head>

				<body>

				<form id="login" action="php/sesion_iniciar.php" method="POST">
				    <h1>Acceso</h1>
				    <fieldset id="inputs" >
				        <input id="username" name="user" type="text" placeholder="Usuario" autofocus required>   
				        <input id="password" name="pass" type="password" placeholder="Contraseña" required>
				    </fieldset>
				    <fieldset id="actions">
				        <input type="submit" id="submit" value="Accesar">
				        <a href="index.php">Ir al sitio JP\'S</a>
				    </fieldset>
				</form>
				</body>
				</html>';
	}else{
		header('Location: administrador/index.php');
	}	
 ?>




