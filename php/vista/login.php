<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<title>Logueo</title>
	<link rel="stylesheet" type="text/css" href="css/estilosgenerales.css">
</head>
<body>
	<header>
		<img src="img/logo.png" alt="Logo de la página">
	</header>
	
	<section class="section-login">
		<h1>INICIAR SESIÓN</h1>
		<form class="formulario-login" action="../controlador/validarUsuario.php" method="POST">
			<label for="usuario"><b>Usuario</b></label>
			<input type="text" id="usuario" name="usuario" placeholder="Ingrese usuario" required>
			<label for="contrasenia"><b>Contraseña</b></label>
			<input type="password"  id="contrasenia" placeholder="Ingrese password" name="contrasenia" required>
			<input type="submit" name="iniciarSesion" value="Iniciar Sesión">
		</form>
	</section>

	<footer>
		
	</footer>
</body>
</html>