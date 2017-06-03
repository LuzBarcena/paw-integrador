<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Registro</title>
	<link rel="stylesheet" type="text/css" href="css/registrarse.css">
	<link rel="stylesheet" type="text/css" href="css/estilosgenerales.css">
	<script type="text/javascript" src="js/jsgenerales.js"></script>
</head>
<body>
	<header>
		<img src="img/logo.png" alt="Logo de la página">
	</header>
	<nav>
		<ul class="topnav" id="myTopnav">
			<li>Inicio</li>
			<li>Perros</li>
			<li>Perdidos</li>
			<li>Noticias</li>
			<li>Tienda</li>
			<a class="icon" onclick="menu()">&#9776;</a>
		</ul>
	</nav>
	<section>
		<form class="formulario" action="">
	    	<div class="container">
				<label><b>Email</b></label>
				<input type="email" placeholder="Ingrese email" name="email" required>
				<label><b>Contraseña</b></label>
				<input type="password" placeholder="Ingrese password" name="contrasenia" required>
				<label><b>Nombre</b></label>
				<input type="text" placeholder="Ingrese su nombre" name="nombre" required>
				<label><b>Apellido</b></label>
				<input type="text" placeholder="Ingrese su apellido" name="apellido" required>
				<div class="botones">
					<button type="submit" class="registro">Registrarse</button>
				</div>
			</div>
		</form>
	</section>
	<footer>
		
	</footer>
</body>
</html>