{extends file="base.tpl"}

{block name=head}
	<link rel="stylesheet" type="text/css" href="css/perros.css">
    {*<script type="text/javascript" src="js/perros.js"></script>*}
{/block}

{block name=section}
    <form class="formulario_filtrado">
        <div class="container">
            <h3>Filtrar por...</h3>
            <fieldset>
                <legend>Tamaño</legend>
                <label for="tamaño">Pequeño
                    <input type="checkbox" name="tamaño" id="" value="pequeño"/>
                </label>
                <label for="tamaño">Mediano
                    <input type="checkbox" name="tamaño" id="" value="mediano"/>
                </label>
                <label for="tamaño">Grande
                    <input type="checkbox" name="tamaño" id="" value="grande"/>
                </label>
            </fieldset>

            <fieldset>
                <legend>Sexo</legend>
                <label for="sexo">Hembra
                    <input type="checkbox" name="sexo" id="" value="hembra"/>
                </label>
                <label for="sexo">Macho
                    <input type="checkbox" name="sexo" id="" value="macho"/>
                </label>
            </fieldset>

            <fieldset>
                <legend>Edad</legend>
                <label for="edad">Cachorro (- 1 año)
                    <input type="checkbox" name="edad" id="" value="cachorro"/>
                </label>
                <label for="edad">Adulto joven (2 a 4 años)
                    <input type="checkbox" name="edad" id="" value="adulto joven"/>
                </label>
                <label for="edad">Adulto (5 a 9 años)
                    <input type="checkbox" name="edad" id="" value="adulto"/>
                </label>
                <label for="edad">Viejito (+ 10 años)
                    <input type="checkbox" name="edad" id="" value="viejito"/>
                </label>
            </fieldset>

            <fieldset>
                <legend>Raza</legend>
                <select name="select_raza">
                    <option value="vacio">Selecione una raza...</option> 
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

    {if $resultado != false}
        {foreach $resultado as $fila}
            <article>
                <header>
                    <h3>{$fila['titulo']}</h3>
                </header>
                <img src="{$fila['foto']}">
                <p>{$fila['descripcion']}</p>
                <p>{$fila['info_contacto']}</p>
                <p>{$fila['ultima_direccion']}</p>
            </article>
        {/foreach}
        {include file="paginado.tpl"}
    {else}
        <h3 style="text-align: center">No hay resultados</h3>
    {/if}
{/block}