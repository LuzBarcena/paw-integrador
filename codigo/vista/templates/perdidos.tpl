{extends file="base.tpl"}

{block name=head}
	<link rel="stylesheet" type="text/css" href="css/perdidos.css">
    <link rel="stylesheet" type="text/css" href="css/paginado.css">
{/block}

{block name=section}
    {if $haySesion}
    <section id="opciones">
        <h2>Agregar perro perdido o encontrado</h2>
        <a id="rojo" href="altaPerdidoEncontrado.php">Agregar</a>
    {else}
        <h3>Nota: Para ingresar un perdido debe iniciar sesión</h3>
    {/if}
    </section>
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
    {else}
        <h2>No hay perdidos cargados</h2>
    {/if}
        <div id="links">
            {if $pag == 1}
                <a class="links" href="perdidos.php?pag={{$pag+1}}">Siguiente</a>
            {else}
                {if $pag == $cantidad}
                    <a class="links" href="perdidos.php?pag={{$pag-1}}">Anterior</a>
                {else}
                    <a class="links" href="perdidos.php?pag={{$pag-1}}">Anterior</a>
                    <a class="links" href="perdidos.php?pag={{$pag+1}}">Siguiente</a>
                {/if}
            {/if}
        </div>
    </section>
{/block}




    
