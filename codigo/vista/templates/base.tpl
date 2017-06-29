<!DOCTYPE html>
<html lang="es">
{include file="head.tpl"}
<body>
	<header>
		<img src="img/logo.png" alt="Logo de la página">
		<h1><a href="index.php">Protectora</a></h1>
		{include file="sesion.tpl"}
	</header>
	<nav>
		<div class="topnav" id="myTopnav">
  			<a href="index.php">Inicio</a>
  			<a href="perros.php">Perros</a>
  			<a href="perdidos.php">Perdidos</a>
  			<a class="icon" onclick="menu()">&#9776;</a>
		</div>	
	</nav>
	
	{block name=section}{/block}
	
	{include file="modal.tpl"}	
	
	<footer>	
		{*<p>Soy footer</p>*}
	</footer>
</body>
</html>