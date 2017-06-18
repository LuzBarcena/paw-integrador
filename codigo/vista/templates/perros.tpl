{extends file="base.tpl"}

{block name=head}
	{*<link rel="stylesheet" type="text/css" href="css/perros.css">*}
{/block}

{block name=section}
    {if $resultado != false}
        {foreach $resultado as $fila}
            <article>
                <header>
                    <h3>{$fila['titulo']}</h3>
                </header>
                <img src="{$fila['foto']}">
                <p>{$fila['descripcion']}</p>
                <p>{$fila['info_contacto']}</p>
                <p>{$fila['ultima_direccion']}</p>
            </article>
        {/foreach}
    {else}
        <h3>No hay resultados</h3>
    {/if}
{/block}