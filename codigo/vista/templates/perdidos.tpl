{extends file="base.tpl"}

{block name=head}
	<link rel="stylesheet" type="text/css" href="css/perdidos.css">
{/block}

{block name=section}
    {foreach $resultado as $fila}
        <div class="perdidos">
            <h3>{$fila['titulo']}</h3>
            <img class="foto_perdidos" alt="Perro perdido" src="{$fila['foto']}">
            <p class="descripcion_perdidos">{$fila['descripcion']}</p> 
            <a href="perdidoIndividual.php?titulo={$fila['titulo']}&foto={$fila['foto']}&descripcion={$fila['descripcion']}&contacto={$fila['info_contacto']}&ultima_direccion={$fila['ultima_direccion']}...">Leer más</a>
        </div>
    {/foreach}
{/block}



    
