{extends file="base.tpl"}

{block name=head}
	<link rel="stylesheet" type="text/css" href="css/perdidos.css">
{/block}

{block name=section}
    {foreach $resultado as $fila}
        <div class="card">
  			<img class="foto_perdidos" src="{$fila['foto']}" alt="Perro perdido" style="width:100%">
 			<div class="container">
    			<h4><b>{$fila['titulo']}</b></h4> 
    			<p>{$fila['descripcion']}</p> 
  			</div>
  			<a href="perdidoIndividual.php?id={$fila['id_perdido']}">Leer más</a>
		</div>
    {/foreach}
{/block}



    
