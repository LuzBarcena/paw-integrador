{extends file="base.tpl"}

{block name=head}
	<link rel="stylesheet" type="text/css" href="css/altaPerro.css">
    {*<script type="text/javascript" src="js/enviarPerro.js"></script>*}
    <script type="text/javascript" src="js/modal.js"></script>
{/block}

{block name=section}
    <form id="formAltaPerro" method="post" enctype="multipart/form-data">
        <div class="container">
            <label for="foto">Foto</label>
            <input type="file" onchange="cargarImagen();" id="foto" name="foto" required=""><br>
            <label for="nombre">Nombre</label>
            <input id="nombre" type="text" name="nombre" required="">
            <fieldset>
                <legend>Edad</legend>
                <label for="edad">Cachorro (- 1 año)
                    <input type="radio" name="edad" id="" value="cachorro"/>
                </label>
                <label for="edad">Adulto joven (2 a 4 años)
                    <input type="radio" name="edad" id="" value="adulto joven"/>
                </label>
                <label for="edad">Adulto (5 a 9 años)
                    <input type="radio" name="edad" id="" value="adulto"/>
                </label>
                <label for="edad">Viejito (+ 10 años)
                    <input type="radio" name="edad" id="" value="viejito"/>
                </label>
            </fieldset>
            <br>
            <label for="particularidad">Particularidad</label>
            <textarea id="particularidad" name="particularidad" rows="5" cols="30" required=""></textarea>
            <fieldset>
                <legend>Referencias</legend>
                <label for="referencias">Se lleva con niños
                    <input type="checkbox" name="referencias" id="" value="se lleva con niños"/>
                </label>
                <label for="referencias">Se lleva con perros
                    <input type="checkbox" name="referencias" id="" value="se lleva con perros"/>
                </label>
                <label for="referencias">Cuidados especiales
                    <input type="checkbox" name="referencias" id="" value="cuidados especiales"/>
                </label>
                <label for="referencias">Discapacitado
                    <input type="checkbox" name="referencias" id="" value="Discapacitado"/>
                </label>
                <label for="referencias">Caracter especial
                    <input type="checkbox" name="referencias" id="" value="caracter especial"/>
                </label>
            </fieldset>
            <br>
            <fieldset>
                <legend>Tamaño</legend>
                <label for="tamaño">Pequeño
                    <input type="radio" name="tamaño" id="" value="pequeño"/>
                </label>
                <label for="tamaño">Mediano
                    <input type="radio" name="tamaño" id="" value="mediano"/>
                </label>
                <label for="tamaño">Grande
                    <input type="radio" name="tamaño" id="" value="grande"/>
                </label>
            </fieldset>
            <br>
            <label for="peso">Peso</label>
            <input type="text" id="peso" name="peso" required="">
            <label for="raza">Raza</label>
            <select id="raza" name="select_raza">
                    <option value="vacio">Selecione una raza...</option> 
                    {foreach $raza as $fila}
                        <option value="{$fila['nombre']}">{$fila['nombre']}</option> 
                    {/foreach}
                </select>
            <div id="boton">
                <input type="button" id="alta" name="alta" value="Dar de alta">
            </div>
        </div>
    </form>
{/block}