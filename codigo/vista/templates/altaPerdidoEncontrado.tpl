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
            <label for="foto">Foto</label> (*)
            <input type="file" onchange="cargarImagen();" id="foto" name="foto" required=""><br>
            <label>¿No tenes foto? Elegí una silueta: </label>
            <a id="btn-silueta" estado="oculto" onclick="mostrarOcultarImg();">Elegir silueta</a>
            <div id="siluetas">
                <figure>
                    <img class="imgSiluetas" id="silueta1" src="img_siluetas/silueta1.png" onclick="cargarSilueta(this);">
                </figure>
            </div>
            <label for="titulo">Título</label> (*)
            <input id="titulo" type="text" name="titulo" required="">

            <label for="descripcion">Descripción</label> (*)
            <textarea id="descripcion" name="descripcion" rows="5" cols="30" required=""></textarea>
            
            <label for="direccion">Dirección</label> (*)
            <input id="direccion" name="direccion" class="controls" type="text" placeholder="Calle número ciudad provincia país">
            <div id="map"></div>
            
            <label>Fecha de desaparición</label>
            <input type="date" min="01-01-1930" placeholder="Formato: dd-mm-yyyy" name="fecha_desaparicion">
            
            <label for="sexo">Sexo</label>
            <div>
                <input type="radio" name="sexo" value="macho"> Macho
                <input type="radio" name="sexo" value="hembra"> Hembra
                <input type="radio" name="sexo" value="desconocido"> Desconocido
            </div>
            
            <label for="nombre" id="nombre">Nombre</label>
            <input type="text" name="nombre">
            <div id="boton">
                <input type="button" id="enviar" name="enviar" value="Enviar">
            </div>
            <p>(*) Campos obligatorios </p>
        </div>
    </form>
{/block}