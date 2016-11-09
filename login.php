<?php session_start(); ?>
<html>
<head>
	<title>Segundo Parcial - Login</title>
	<script src="js/jquery-3.1.1.min.js"></script>
	<script src="js/funciones.js"></script>
	<link rel="stylesheet" type="text/css" href="css/estilo.css">
</head>
<body>
		<div class="login-page">
		<div class="form">
		<form>
			<input type="text"       id="usuario" placeholder="Ingrese usuario...">
			<input type="password"   id="clave"   placeholder="Ingrese clave...">
			<input type="button" value="Aceptar" onclick="Login()">
		</form>
		<div id="contenedor">
		</div>
		Usuarios que funcionan para login basado en el web service foraneo:<br><br>
		<table>
		<tr><th>User</th><th>Pass</th></tr>
		<tr><td>admin@admin.com</td><td>123456</td></tr>
		<tr><td>user@user.com</td><td>123456</td></tr>
		<tr><td>invitado@guest.com</td><td>123456</td></tr>
		</table>
		</div>
		</div>


</body>
</html>	



