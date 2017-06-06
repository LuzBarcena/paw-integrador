<?php
	include '../controlador/SesionControlador.php';
?>

<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="css/estilosgenerales.css">
	<link rel="stylesheet" type="text/css" href="css/index.css">
	<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
	<script type="text/javascript" src="js/jsgenerales.js"></script>
</head>
<body>
	<header>
		<img src="img/logo.png" alt="Logo de la página">
		<?php if (SesionControlador::haySesion()): ?>
			<p id="nombreSesion"> Usuario <?= SesionControlador::getSesion(); ?> </p>
			<form class="form-sesion-registro" action="../controlador/handler.php" method="POST">
				<input class="btn-sesion-registro" type="submit" name="cerrarSesion" value="Cerrar Sesión">
			</form>
		<?php else: ?>
			<form class="form-sesion-registro" action="../controlador/handler.php" method="POST">
				<input class="btn-sesion-registro" type="submit" name="iniciarSesion" value="Iniciar Sesión">
			</form>
			<form class="form-sesion-registro" action="../controlador/handler.php" method="POST">
				<input class="btn-sesion-registro" type="submit" name="registrarse" value="Registrarse">
			</form>
		<?php endif ; ?>
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
		<div class="carrusel">
			<div class="slideshow-container">
	  			<div class="mySlides fade">
	    			<div class="numbertext">1 / 3</div>
	    			<img class="img-carrusel" src="img/carrusel1.jpg" style="width:100%;">
	  			</div>

	  			<div class="mySlides fade">
	    			<div class="numbertext">2 / 3</div>
	    			<img class="img-carrusel" src="img/carrusel2.jpg" style="width:100%">
	  			</div>

		  		<div class="mySlides fade">
	    			<div class="numbertext">3 / 3</div>
	    			<img class="img-carrusel" src="img/carrusel3.jpg" style="width:100%">
	  			</div>

	  			<a class="prev" onclick="plusSlides(-1)">&#10094;</a>
	  			<a class="next" onclick="plusSlides(1)">&#10095;</a>
			</div>
			<br>

			<div style="text-align:center">
	  			<span class="dot" onclick="currentSlide(1)"></span> 
	  			<span class="dot" onclick="currentSlide(2)"></span> 
	  			<span class="dot" onclick="currentSlide(3)"></span> 
			</div>
		</div>
	</section>

	<section class="descripcion">
		<p>
			<cite>
				Un perro no busca autos grandes, casas lujosas o ropa de diseñadores. Con agua y comida estará bien. 
				No les importa si eres pobre o rico. Listo o tonto. Inteligente o estúpido. Dale tu corazón y el te dará el suyo.
				¿Cuántas personas pueden hacerte sentir así, puro y especial? ¿Cuántas personas pueden hacerte sentir extraordinario?
			</cite>
		</p>	
	</section>
	
	<footer>	
	</footer>
	<script type="text/javascript" src="js/carrusel.js"></script>
</body>
</html>