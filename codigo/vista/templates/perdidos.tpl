{extends file="base.tpl"}

{block name=head}
	<link rel="stylesheet" type="text/css" href="css/perdidos.css">
    <link rel="stylesheet" type="text/css" href="css/paginado.css">
{/block}

{block name=section}
    {if $haySesion}
    <div class="dosOpciones">
        <a id="rojo" href="altaPerdidoEncontrado.php">Perdí o encontre un perro</a>
    </div>
    {else}
    <div class="dosOpciones">
        <h4>Nota: Para ingresar un perdido debe iniciar sesión</h4>
    </div>
    {/if}
    <section id="lista_perdidos">
    {if $resultado != false}    
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
        {include file="paginado.tpl"}
    {else}
        <h2>No hay perdidos cargados</h2>
    {/if}
        {*<p>{$pag}</p>
        <a href="perdidos.php?pag={{$pag-1}}">Anterior</a>
        <a href="perdidos.php?pag={{$pag+1}}">Siguiente</a>*}
    </section>
{/block}




    
