{extends file="base.tpl"}

{block name=head}
	<link rel="stylesheet" type="text/css" href="css/perros.css">
    <link rel="stylesheet" type="text/css" href="css/paginado.css">
    <script type="text/javascript" src="js/enviarFiltros.js"></script>
{/block}

{block name=section}
<section>
    {if $admin != false}
    <div class="opcionAlta">
        <a id="altaPerro" href="altaPerro.php">Agregar perro</a>
    </div>
    {/if}
	<form class="formulario">
            <h2>Filtrar por...</h2>
            <div class="checkbox">
                <h4><strong>Tamaño (*)</strong></h4>     
                <input type="checkbox" name="tamanio" id="chico" value="Chico"/>
                <label for="chico">Pequeño</label>
                    
                <input type="checkbox" name="tamanio" id="mediano" value="Mediano"/>
                <label for="mediano">Mediano</label>
                    
                <input type="checkbox" name="tamanio" id="grande" value="Grande"/>
                <label for="grande">Grande</label>
            </div>

            <div class="radio">
                <h4><strong>Sexo</strong></h4>
                <input type="radio" name="sexo" id="hembra" value="Hembra"/>
                <label for="hembra">Hembra</label>
                    
                <input type="radio" name="sexo" id="macho" value="Macho"/>
                <label for="macho">Macho</label>
            </div>

            <div class="checkbox">
                <h4><strong>Edad</strong></h4>
                <input type="checkbox" name="edad" id="cachorro" value="Cachorro"/>
                <label for="cachorro">Cachorro (- 1 año)</label>
                    
                <input type="checkbox" name="edad" id="joven" value="Adulto joven"/>
                <label for="joven">Adulto joven (1 a 4 años)</label>
                    
                <input type="checkbox" name="edad" id="adulto" value="Adulto"/>
                <label for="adulto">Adulto (5 a 9 años)</label>
                    
                <input type="checkbox" name="edad" id="viejito" value="Viejito"/>
                <label for="viejito">Viejito (+ 10 años)</label>
            </div>

            <h4><strong>Raza (*)</strong></h4>
            <select name="select_raza">
                <option>Todas</option> 
                {foreach $raza as $fila}
                    <option value="{$fila['nombre']}">{$fila['nombre']}</option> 
                {/foreach}
            </select>
            <div class="botones">
                <input type="button" class="consultar" name="consultar" value="Consultar"></input>
            </div>
    </form>
    <div id="resultado"></div>
</section>
{/block}