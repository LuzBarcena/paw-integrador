{extends file="base.tpl"}

{block name=head}
	<link rel="stylesheet" type="text/css" href="css/miPerfil.css">
{/block}

{block name=section}
	<section id="mi_perfil">
		<div id="mi_info">
			{if {$resultado != false}}
				<h3>Usuario</h3>
				<p>Nombre: {$resultado['nombre']}</p>
				<p>Apellido: {$resultado['apellido']}</p>
			{else}
				<p>No hay usuario</p>
			{/if}
		</div>

		<button class="accordion">Adoptados</button>	
		<div class="panel">
  			<p>Lorem ipsum...</p>
		</div>

		<button class="accordion">Apadrinados</button>
		<div class="panel">
  			<p>Lorem ipsum...</p>
		</div>
	</section>


	<script type="text/javascript" src=js/acordion.js></script>
{/block}