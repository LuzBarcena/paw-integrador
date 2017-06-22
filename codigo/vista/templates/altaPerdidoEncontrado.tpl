{extends file="base.tpl"}

{block name=head}
	<link rel="stylesheet" type="text/css" href="css/altaPerdidoEncontrado.css">
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD3TroLO9J7HZf-3xEdRMhl2V7LZfXTHgA&libraries=places"></script>
    <script type="text/javascript" src="js/autocompletarMapa.js"></script>
    <script type="text/javascript" src="js/enviarPerdido.js"></script>
{/block}

{block name=section}
    <form id="formAltaPerdidoEncontrado" method="post">
        <div class="container">
            <label for="titulo">Título</label>
            <input id="titulo" type="text" name="titulo" required="">
            <label for="desripcion">Descripción</label>
            <textarea id="desripcion" name="desripcion" rows="5" cols="30" required=""></textarea>
            <label for="foto">Foto</label>
            <input type="file" id="foto" name="foto" required="">
            <label for="direccion">Dirección</label>
            <input id="direccion" class="controls" type="text" placeholder="Calle, número, barrio , provincia, país">
            <div id="map"></div>
            <div id="boton">
                <input type="submit" id="enviar" name="enviar" value="Enviar">
            </div>
        </div>
    </form>
    
{/block}