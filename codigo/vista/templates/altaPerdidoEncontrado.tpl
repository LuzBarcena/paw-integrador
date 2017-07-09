{extends file="base.tpl"}

{block name=head}
	<link rel="stylesheet" type="text/css" href="css/altaPerdidoEncontrado.css">
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD3TroLO9J7HZf-3xEdRMhl2V7LZfXTHgA&libraries=places"></script>
    <script type="text/javascript" src="js/autocompletarMapa.js"></script>
    <script type="text/javascript" src="js/enviarPerdido.js"></script>
    <script type="text/javascript" src="js/modal.js"></script>
{/block}

{block name=section}
    <section class="contenedor_alta">
        <form id="formAltaPerdidoEncontrado" class="formulario" method="post" enctype="multipart/form-data">
            <h2>AGREGAR PERDIDO</h2>
            <h4><strong>Foto (*)</strong></h4>
            <input type="file" onchange="cargarImagen();" id="foto" name="foto" required="">

            <h4><strong>¿No tenes foto? Elegí una silueta: </strong></h4>
            <a id="btn-silueta" estado="oculto" onclick="mostrarOcultarImg();">Elegir silueta</a>
            <img id="img-ok" src="img/tick.png" style="display: none;">
            <div id="siluetas">
            {foreach $siluetas as $silueta}
                <figure class="figures">
                    <img class="imgSiluetas" id="{$silueta['id']}" src="{$silueta['path']}" onclick="cargarSilueta(this);">
                </figure>
            {/foreach}
            </div>
            <h4><strong>Título (*)</strong></h4>
            <input id="titulo" type="text" name="titulo" required="">

            <h4><strong>Descripción (*)</strong></h4>
            <textarea id="descripcion" name="descripcion" rows="5" cols="30" required=""></textarea>
            
            <h4><strong>Dirección (*)</strong></h4>
            <input id="direccion" name="direccion" class="controls" type="text" placeholder="Calle número ciudad provincia país">
            <div id="map"></div>
            
            <h4><strong>Fecha de desaparición</strong></h4>
            <input type="date" min="01-01-1930" placeholder="Formato: dd-mm-yyyy" name="fecha_desaparicion">
            
			<h4><strong>Número de contacto (*)</strong></h4>
            <input type="tel" placeholder="Número de contacto" name="tel">
			
            <div class="radio">
                <h4><strong>Sexo</strong></h4>
                <input type="radio" name="sexo" id="hembra" value="Hembra"/>
                <label for="hembra">Hembra</label>
                    
                <input type="radio" name="sexo" id="macho" value="Macho"/>
                <label for="macho">Macho</label>

                <input type="radio" name="sexo" id="desconocido" value="Desconocido"/>
                <label for="desconocido">Desconocido</label>
            </div>
            
            <h4><strong>Nombre</strong></h4>
            <input type="text" name="nombre">
            <p>(*) Campos obligatorios </p>
            <div id="boton">
                <input type="button" id="enviar" name="enviar" value="Enviar">
            </div>
        </form>
    </section>
{/block}