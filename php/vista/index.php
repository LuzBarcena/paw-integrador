<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="css/estilosgenerales.css">
	<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
	<script type="text/javascript" src="js/jsgenerales.js"></script>
</head>
<body>
	<header>
		<img src="img/logo.png" alt="Logo de la página">
		<?php
			session_start();
			if (isset($_SESSION["login"])) {
				//Si hay sesion muestro nombre
				echo "Sesión de " . $_SESSION["login"];
				echo '
					<form class="sesiones" action="../controlador/handler.php" method="POST">
						<input type="submit" name="cerrarSesion" value="Cerrar Sesión">
					</form>
				';
			}else{
				echo '
					<form class="sesiones" action="../controlador/handler.php" method="POST">
						<input type="submit" name="iniciarSesion" value="Iniciar Sesión">
					</form>
				';
			}
		?>
		
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
	<footer>
		
	</footer>
</body>
</html>