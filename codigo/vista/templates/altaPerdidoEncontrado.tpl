{extends file="base.tpl"}

{block name=head}
	<link rel="stylesheet" type="text/css" href="css/altaPerdidoEncontrado.css">
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD3TroLO9J7HZf-3xEdRMhl2V7LZfXTHgA&libraries=places"></script>
    <script type="text/javascript" src="js/autocompletarMapa.js"></script>
    <script type="text/javascript" src="js/enviarPerdido.js"></script>
    <script type="text/javascript" src="js/modal.js"></script>
{/block}

{block name=section}
    <form id="formAltaPerdidoEncontrado" method="post" enctype="multipart/form-data">
        <div class="container">
            <label for="foto">Foto</label>
            <input type="file" onchange="previewFile()" id="foto" name="foto" required=""><br
            <label for="titulo">Título</label>
            <input id="titulo" type="text" name="titulo" required="">
            <label for="desripcion">Descripción</label>
            <textarea id="descripcion" name="descripcion" rows="5" cols="30" required=""></textarea>
            <label for="direccion">Dirección</label>
            <input id="direccion" name="direccion" class="controls" type="text" placeholder="Calle, número, barrio , provincia, país">
            <div id="map"></div>
            <div id="boton">
                <input type="button" id="enviar" name="enviar" value="Enviar">
            </div>
        </div>
    </form>
{/block}