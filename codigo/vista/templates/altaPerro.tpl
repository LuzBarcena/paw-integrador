{extends file="base.tpl"}

{block name=head}
	<link rel="stylesheet" type="text/css" href="css/altaPerro.css">
    <script type="text/javascript" src="js/enviarPerro.js"></script>
    <script type="text/javascript" src="js/modal.js"></script>
{/block}

{block name=section}
    <form id="formAltaPerro" method="post" enctype="multipart/form-data">
        <div class="container">
            <label for="foto">Foto (*)</label>
            <input type="file" onchange="cargarImagen();" id="foto" name="foto" required=""><br>
            <label for="nombre">Nombre (*)</label>
            <input id="nombre" type="text" name="nombre" required="">
            <fieldset>
                <legend>Edad</legend>
                <label for="edad">Cachorro (- 1 año)
                    <input type="radio" name="edad" id="" value="Cachorro"/>
                </label>
                <label for="edad">Adulto joven (1 a 4 años)
                    <input type="radio" name="edad" id="" value="Adulto joven"/>
                </label>
                <label for="edad">Adulto (5 a 9 años)
                    <input type="radio" name="edad" id="" value="Adulto"/>
                </label>
                <label for="edad">Viejito (+ 10 años)
                    <input type="radio" name="edad" id="" value="Viejito"/>
                </label>
            </fieldset>
            <br>
            <fieldset>
                <legend>Sexo</legend>
                <label for="sexo">Hembra
                    <input type="radio" name="sexo" id="" value="Hembra"/>
                </label>
                <label for="sexo">Macho
                    <input type="radio" name="sexo" id="" value="Macho"/>
                </label>
            </fieldset>
            <br>
            <label for="particularidad">Particularidad</label>
            <textarea id="particularidad" name="particularidad" rows="5" cols="30"></textarea>
            <fieldset>
                <legend>Referencias</legend>
                <label for="referencias">Se lleva con niños
                    <input type="checkbox" name="referencias" value="Se lleva con ninios"/>
                </label>
                <label for="referencias">Se lleva con perros
                    <input type="checkbox" name="referencias" value="Se lleva con perros"/>
                </label>
                <label for="referencias">Cuidados especiales
                    <input type="checkbox" name="referencias" value="Cuidados especiales"/>
                </label>
                <label for="referencias">Discapacitado
                    <input type="checkbox" name="referencias" value="Discapacitado"/>
                </label>
                <label for="referencias">Caracter especial
                    <input type="checkbox" name="referencias" value="Caracter especial"/>
                </label>
            </fieldset>
            <br>
            <fieldset>
                <legend>Tamaño (*)</legend>
                <label for="tamanio">Pequeño
                    <input type="radio" name="tamanio" id="" value="Chico"/>
                </label>
                <label for="tamanio">Mediano
                    <input type="radio" name="tamanio" id="" value="Mediano"/>
                </label>
                <label for="tamanio">Grande
                    <input type="radio" name="tamanio" id="" value="Grande"/>
                </label>
            </fieldset>
            <br>
            <label for="peso">Peso</label>
            <input type="number" id="peso" name="peso" step="0.1" min="0" max="80">
            <br>
            <br>
            <label for="raza">Raza (*)</label>
            <select id="raza_select" name="select_raza">
                    <option value="vacio">Selecione una raza...</option> 
                    {foreach $raza as $fila}
                        <option value="{$fila['nombre']}">{$fila['nombre']}</option> 
                    {/foreach}
            </select>
            <div id="boton">
                <input type="button" id="alta" name="alta" value="Dar de alta">
            </div>
            <p>(*) Campos obligatorios </p>
        </div>
    </form>
{/block}