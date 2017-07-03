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
  			<div class="lista_perros">
    			{if $adoptados != false}    
        			{foreach $adoptados as $fila}
            			<div class="card">
  			   				<img class="foto_perro" src="img_perros/{$fila['foto']}.jpg" alt="Perro adoptado" style="width:100%">
 			   		 		<div class="container">
    			    			<h4><b>{$fila['nombre']}</b></h4> 
  			    			</div>
  			    			<a href="perroIndividual.php?id={$fila['id_perro']}">Leer más</a>
		   			 	</div>
        			{/foreach}
    			{else}
        			<h5>No tiene perros adoptados</h5>
    			{/if}
        	</div>
		</div>

		<button class="accordion">Apadrinados</button>
		<div class="panel">
  			<div class="lista_perros">
    			{if $apadrinados != false}    
        			{foreach $apadrinados as $fila}
            			<div class="card">
  			   				<img class="foto_perro" src="img_perros/{$fila['foto']}.jpg" alt="Perro apadrinado" style="width:100%">
 			   		 		<div class="container">
    			    			<h4><b>{$fila['nombre']}</b></h4> 
  			    			</div>
  			    			<a href="perroIndividual.php?id={$fila['id_perro']}">Leer más</a>
		   			 	</div>
        			{/foreach}
    			{else}
        			<h5>No tiene perros apadrinados</h5>
    			{/if}
        	</div>
		</div>
	</section>


	<script type="text/javascript" src=js/acordion.js></script>
{/block}