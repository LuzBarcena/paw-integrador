<!DOCTYPE html>
<html lang="es">
{include file="head.tpl"}
<body>
	<header>
		<img src="img/logo.png" alt="Logo de la página">
		<h1><a href="index.php">Protectora</a></h1>
		
	</header>
	<nav class="topnav" id="myTopnav">
		<a href="index.php"><span class="fa fa-home"></span> Inicio</a>
		<a href="perros.php"><span class="fa fa-paw"></span> Perros</a>
		<a href="perdidos.php"><span class="fa fa-paw"></span> Perdidos</a>
		{include file="sesion.tpl"}
		<a class="icon" onclick="menu()"><span class="fa fa-navicon"></span></a>
	</nav>	
	{block name=section}{/block}
	{include file="modal.tpl"}	
</body>
</html>