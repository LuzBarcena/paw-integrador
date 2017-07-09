{extends file="base.tpl"}

{block name=head}
	<link rel="stylesheet" type="text/css" href="css/miPerfil.css">
{/block}

{block name=section}
	<section id="mi_perfil">
		<div id="mi_info">
			{if {$resultado != false}}
				<h2>{$resultado['nombre']}</h2>
        <div class="danger">
          <p><strong>{$resultado['apellido']}</strong></p>
        </div>
			{else}
				<p><strong>No hay usuario</strong></p>
			{/if}
		</div>

		<button class="accordion"><strong>Adoptados</strong></button>	
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

		<button class="accordion"><strong>Apadrinados</strong></button>
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