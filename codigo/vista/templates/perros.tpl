{extends file="base.tpl"}

{block name=head}
	<link rel="stylesheet" type="text/css" href="css/perros.css">
    <link rel="stylesheet" type="text/css" href="css/paginado.css">
    <script type="text/javascript" src="js/enviarFiltros.js"></script>
{/block}

{block name=section}
    {if $admin != false}
    <div class="opcionAlta">
        <a id="altaPerro" href="altaPerro.php">Alta perro</a>
    </div>
    {/if}
	<form class="formulario_filtrado">
        <div class="container">
            <h3>Filtrar por...</h3>
            <fieldset>
                <legend>Tamaño</legend>
                <label for="tamanio">Chico
                    <input type="checkbox" name="tamanio" id="" value="Chico"/>
                </label>
                <label for="tamaño">Mediano
                    <input type="checkbox" name="tamanio" id="" value="Mediano"/>
                </label>
                <label for="tamaño">Grande
                    <input type="checkbox" name="tamanio" id="" value="Grande"/>
                </label>
            </fieldset>

            <fieldset>
                <legend>Sexo</legend>
                <label for="sexo">Hembra
                    <input type="checkbox" name="sexo" id="" value="Hembra"/>
                </label>
                <label for="sexo">Macho
                    <input type="checkbox" name="sexo" id="" value="Macho"/>
                </label>
            </fieldset>

            <fieldset id="edad">
                <legend>Edad</legend>
                <label for="edad">Cachorro (- 1 año)
                    <input type="checkbox" name="edad" id="" value="Cachorro"/>
                </label>
                <label for="edad">Adulto joven (1 a 4 años)
                    <input type="checkbox" name="edad" id="" value="Adulto joven"/>
                </label>
                <label for="edad">Adulto (5 a 9 años)
                    <input type="checkbox" name="edad" id="" value="Adulto"/>
                </label>
                <label for="edad">Viejito (+ 10 años)
                    <input type="checkbox" name="edad" id="" value="Viejito"/>
                </label>
            </fieldset>

            <fieldset>
                <legend>Raza</legend>
                <select name="select_raza">
                    <option>Todas</option> 
                    {foreach $raza as $fila}
                        <option value="{$fila['nombre']}">{$fila['nombre']}</option> 
                    {/foreach}
                </select>
            </fieldset>

            <div class="botones">
                <input type="button" class="consultar" name="consultar" value="Consultar"></input>
            </div>
        </div>
    </form>
    <div id="resultado"></div>
{/block}