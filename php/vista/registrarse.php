<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Registro</title>
	<link rel="stylesheet" type="text/css" href="css/registrarse.css">
	<link rel="stylesheet" type="text/css" href="css/estilosgenerales.css">
	<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
	<script type="text/javascript" src="js/validaciones.js"></script>
	<script type="text/javascript" src="js/jsgenerales.js"></script>
</head>
<body>
	<header>
		<img src="img/logo.png" alt="Logo de la página">
	</header>
	<nav>
		<ul class="topnav" id="myTopnav">
			<li><a href="index.php">Inicio</a></li>
			<li><a href="">Perros</a></li>
			<li><a href="">Perdidos</a></li>
			<li><a href="">Noticias</a></li>
			<li><a href="">Tienda</a></li>
			<a class="icon" onclick="menu()">&#9776;</a>
		</ul>
	</nav>
	<section>
		<!-- onsubmit="return validar();" -->
		<form class="formulario_registro" method="post" action="../controlador/validarRegistro.php" onsubmit="return validar();">
	    	<div class="container">
	    		<label><b>Nombre de usuario</b></label>
				<input type="text" min="3" max="30" placeholder="Ingrese nombre de usuario" name="nombre_usuario" required>
				<label><b>Email</b></label>
				<input type="email" min="11" max="50" placeholder="Ingrese email" name="email" onchange="" required>
				<label><b>Contraseña</b></label>
				<input type="password" min="6" max="30" placeholder="Ingrese contraseña" name="contrasenia" onchange="" required>
				<label><b>Repita contraseña</b></label>
				<input type="password" min="6" max="30" placeholder="Ingrese contraseña" name="contrasenia2" onchange="" required>
				<label><b>Nombre</b></label>
				<input type="text" min="3" max="50" placeholder="Ingrese su nombre" name="nombre" onchange="" required>
				<label><b>Apellido</b></label>
				<input type="text" min="3" max="50" placeholder="Ingrese su apellido" name="apellido" onchange="" required>
				<label><b>Fecha de nacimiento</b></label>
				<input type="date" min="01-01-1930" max=""<?php echo date('Y-m-d'); ?>" placeholder="Fecha" name="fecha_nacimiento" onchange="" required>
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