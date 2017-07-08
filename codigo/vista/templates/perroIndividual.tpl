{extends file="base.tpl"}

{block name=head}
	<link rel="stylesheet" type="text/css" href="css/perroIndividual.css">
    <script type="text/javascript" src="js/perroIndividual.js"></script>
{/block}

{block name=section}
	<div class="container">
		<section id="info-perro">
			<div id="imagen">
				<img src="{$foto}" alt="Imagen del perro" style="width:100%">
			</div>
			<div id="informacion">
				<div class="danger atributo">
					<p><strong>Nombre </strong> {$nombre}</p>
				</div>
				<div class="success atributo">
					<p><strong>Edad </strong> {$edad}</p>
				</div>
				<div class="info atributo">
					<p><strong>Sexo </strong> {$sexo}</p>
				</div>
				<div class="warning atributo">
					<p><strong>Particularidad </strong> {$particularidad}</p>
				</div>
				<div class="danger atributo">
					<p><strong>Tamaño </strong> {$tamanio}</p>
				</div>
				<div class="success atributo">
					<p><strong>Peso </strong> {$peso}</p>
				</div>
				<div class="info atributo">
					<p><strong>Raza </strong> {$raza}</p>
				</div>
				{if $nombrePadrino != false}
					<div class="warning atributo">
						<p><strong>Su padrino </strong> {$nombrePadrino}</p>
					</div>
				{/if}
				{if $referencias_perro != false}
					<div class="danger atributo">
						<p><strong>Info adicional </strong></p>
						<ul>
						{foreach $referencias_perro as $ref}
							<li><img src="{$ref}"></li>
						{/foreach}
						</ul>
					</div>
				{else}
					<div class="danger atributo">
						<p><strong>Info adicional (referencias) </strong> Ninguna</p>
					</div>
				{/if}
				{if $haySesion != false}
					<div id="opciones">
						{if empty($adoptante)}
							<input type="button" onclick="adoptar({$id},{$id_perro})" class="button" value="Adoptar">
						{/if}
						{if empty($padrino) and empty($adoptante)}
							<input type="button" onclick="apadrinar({$id},{$id_perro})" class="button" value="Apadrinar">
						{/if}
					</div>
				{/if}
			</div>
		</section>
		<section>
		{if $referencias != false}
			<h4>Referencias</h4>
			<table id="tabla-referencias">
				<thead>
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
	</div>
{/block}