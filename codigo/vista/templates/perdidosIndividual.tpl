{extends file="base.tpl"}

{block name=head}
	<link rel="stylesheet" type="text/css" href="css/perdidoIndividual.css">
{/block}

{block name=section}
        <div class="card">
            <img class="foto_perdidos" src="{$foto}" alt="Perro perdido" style="width:100%">
            <div class="container">
                <h4><b>{$titulo}</b></h4> 
                <p class="descripcion_perdidos">{$descripcion}</p>
                <p class="info_contacto_perdidos">{$info_contacto}</p>
                <p class="ultima_direccion_perdidos">{$ultima_direccion}</p>
            </div>
        </div>
{/block}