{extends file="base.tpl"}

{block name=head}
	<link rel="stylesheet" type="text/css" href="css/perdidoIndividual.css">
    <link rel="stylesheet" type="text/css" href="css/perdidoIndividual2.css">
    <script type="text/javascript" src="//maps.googleapis.com/maps/api/js?key=AIzaSyD3TroLO9J7HZf-3xEdRMhl2V7LZfXTHgA"></script>
    <script type="text/javascript" src="js/perdidosIndividual.js"></script>
	<script type="text/javascript" src="js/marcarEncontrado.js"></script>
{/block}

{block name=section}
	{if {$mismoUsuario} != false}
        <div id="marcarEncontrado">
            <input type="button" id="button" onclick="marcar({$id})" value="Marcar como encontrado">
        </div>
    {/if}
    <section id="infoCompletaPerdido">
       <div class="card">
            <img class="foto_perdidos" src="{$foto}" alt="Perro perdido" style="width:100%">
            <div class="container">
                <h4>{$titulo}</h4>
                <p>Fecha de desaparición: {$fechaDesaparicion}</p>
                <p>Fecha de alta de artículo: {$fechaAlta}</p>
                <p id="latitud" style="display: none">{$latitud}</p>
                <p id="longitud" style="display: none">{$longitud}</p>
                <p id="direccion">Dirección completa:</p>
                <p>Sexo: {$sexo}</p>
                <p>Nombre: {$nombre}</p>
                <p class="descripcion_perdidos">{$descripcion}</p>
            </div>
        </div>
        <div id="map"></div>
    </section> 
{/block}

