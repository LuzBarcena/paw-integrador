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
			echo "Sesión de :" . $_SESSION['login'];
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