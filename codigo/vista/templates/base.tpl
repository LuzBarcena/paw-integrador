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
	
	<!--<nav>
		<ul class="topnav" id="myTopnav">
			<li><a href="index.php">Inicio</a></li>
			<li><a href="">Perros</a></li>
			<li><a href="perdidos.php">Perdidos</a></li>
			<li><a href="">Noticias</a></li>
			<li><a href="">Tienda</a></li>
			<a class="icon" onclick="menu()">&#9776;</a>
		</ul>
	</nav>-->
	<nav>
		<div class="topnav" id="myTopnav">
  			<a href="index.php">Inicio</a>
  			<a href="">Perros</a>
  			<a href="perdidos.php">Perdidos</a>
  			<a href="">Tienda</a>
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