{extends file="base.tpl"}

{block name=head}
	<link rel="stylesheet" type="text/css" href="css/perroIndividual.css">
    <script type="text/javascript" src="js/perroIndividual.js"></script>
{/block}

{block name=section}
	<section id="info-perro">
		<div class="card">
			<img src="{$foto}" alt="Imagen del perro" style="width:100%">
			<div class="container">
				<h4><b>{$nombre}</b></h4> 
				<p>Sexo: {$sexo}</p>
				<p>Particularidad: {$particularidad}</p>
				<p>Tamaño: {$tamanio}</p>
				<p>Peso: {$peso}</p>
				<p>Raza: {$raza}</p>
				<p>Info adicional:</p>
				<ul>
					{if $referencias_perro != false}
						{foreach $referencias_perro as $ref}
						<li><img src="{$ref}"></li>
						{/foreach}
					{/if}
				</ul>
			</div>
		</div>
	</section>
	<section>
	{if $referencias != false}    
		<table id="tabla-referencias">
			<thead>
				<tr><th>Referencias</th></tr>
				<tr>
					{foreach $referencias as $fila}
					<th>{$fila['nombre']}</th>
					{/foreach}
				</tr>
			</thead>
			<tbody>
				<tr>
					{foreach $referencias as $fila}
					<td><img src="img_referencias/{$fila['imagen']}"></td>
					{/foreach}
				</tr>
			</tbody>	
		</table>
	{else}
		<h2>Error mostrando las referencias</h2>
	{/if}
	</section>
{/block}