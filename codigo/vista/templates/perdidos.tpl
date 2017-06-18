{extends file="base.tpl"}

{block name=head}
	{*<link rel="stylesheet" type="text/css" href="css/perdidos.css">*}
{/block}

{block name=section}
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
{/block}