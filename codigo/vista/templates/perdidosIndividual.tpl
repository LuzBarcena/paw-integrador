{extends file="base.tpl"}

{block name=head}
	<link rel="stylesheet" type="text/css" href="css/perdidoIndividual.css">
{/block}

{block name=section}
        <article class="articulo_perdidos">
            <header class="header_perdidos">
                <h3>{$titulo}</h3>
            </header>
            <div class="perdido">
                <img class="foto_perdidos" alt="Perro perdido" src="{$foto}" style="width:100%">
                <div class="container_info">
                    <p class="descripcion_perdidos">{$descripcion}</p>
                    <p class="info_contacto_perdidos">{$info_contacto}</p>
                    <p class="ultima_direccion_perdidos">{$ultima_direccion}</p>
                </div>
            </div>
        </article>
{/block}