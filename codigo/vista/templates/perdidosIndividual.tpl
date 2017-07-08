{extends file="base.tpl"}

{block name=head}
	<link rel="stylesheet" type="text/css" href="css/perdidoIndividual.css">
    <link rel="stylesheet" type="text/css" href="css/perdidoIndividual2.css">
    <script type="text/javascript" src="//maps.googleapis.com/maps/api/js?key=AIzaSyD3TroLO9J7HZf-3xEdRMhl2V7LZfXTHgA"></script>
    <script type="text/javascript" src="js/perdidosIndividual.js"></script>
	<script type="text/javascript" src="js/marcarEncontrado.js"></script>
{/block}

{block name=section}
    <div class="container">
        <section id="infoCompletaPerdido">
            <div id="imagen">
                {if {$mismoUsuario} != false}
                <div id="marcarEncontrado">
                    <input type="button" id="button" onclick="marcar({$id})" value="Marcar como encontrado">
                </div>
                {/if}
                <img class="foto_perdidos" src="{$foto}" alt="Perro perdido" style="width:100%">
            </div>
            <div id="informacion">
                <p id="latitud" style="display: none">{$latitud}</p>
                <p id="longitud" style="display: none">{$longitud}</p>
                <h3>{$titulo}</h3>
                <div class="danger atributo">
                    <p><strong>Fecha de desaparición </strong> {$fechaDesaparicion}</p>
                </div>
                <div class="success atributo">
                    <p><strong>Fecha de alta de artículo </strong> {$fechaAlta}</p>
                </div>
                <div class="info atributo">
                    <p id="direccion"><strong>Dirección completa </strong></p>
                </div>
                <div class="warning atributo">
                    <p><strong>Sexo </strong> {$sexo}</p>
                </div>
                <div class="danger atributo">
                    <p><strong>Nombre </strong> {$nombre}</p>
                </div>
                <div class="success atributo">
                    <p class="descripcion_perdidos"><strong>Descripción </strong> {$descripcion}</p>
                </div>
                <div id="map"></div>
            </div>
        </section>
    </div> 
{/block}

