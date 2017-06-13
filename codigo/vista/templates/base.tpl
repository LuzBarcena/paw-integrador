<!DOCTYPE html>
<html lang="es">
{include file="head.tpl"}
<body>
	<header>
		<img src="img/logo.png" alt="Logo de la página">
		{include file="sesion.tpl"}
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
	
	{block name=section}{/block}

	<footer>	
		<p>Soy footer</p>
	</footer>

	{block name=script}{/block}	
</body>
</html>