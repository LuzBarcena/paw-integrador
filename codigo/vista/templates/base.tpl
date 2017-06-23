<!DOCTYPE html>
<html lang="es">
{include file="head.tpl"}
<body>
	{if {$haySesion}}
		
	{/if}
	<header>
		<img src="img/logo.png" alt="Logo de la página">
		<h1><a href="index.php">Protectora</a></h1>
		{include file="sesion.tpl"}
	</header>
	
	<nav>
		<ul class="topnav" id="myTopnav">
			<li><a href="index.php">Inicio</a></li>
			<li><a href="">Perros</a></li>
			<li><a href="perdidos.php">Perdidos</a></li>
			<li><a href="">Noticias</a></li>
			<li><a href="">Tienda</a></li>
			<a class="icon" onclick="menu()">&#9776;</a>
		</ul>
	</nav>
	{block name=dosOpciones}{/block}
	{block name=section}{/block}
	{block name=paginado}{/block}
	<footer>	
		{*<p>Soy footer</p>*}
	</footer>

	{include file="modal.tpl"}	

	{block name=scriptCarrusel}{/block}
</body>
</html>