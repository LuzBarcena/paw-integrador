{extends file="base.tpl"}

{block name=head}
	<link rel="stylesheet" type="text/css" href="css/altaPerro.css">
    <script type="text/javascript" src="js/enviarPerro.js"></script>
    <script type="text/javascript" src="js/modal.js"></script>
{/block}

{block name=section}
    <section class="contenedor_alta">
        <form id="formAltaPerro" class="formulario" method="post" enctype="multipart/form-data">
            <h2>AGREGAR PERRO</h2>
            <h4><strong>Foto (*)</strong></h4>
            <input type="file" onchange="cargarImagen();" id="foto" name="foto" required="">

            <h4><strong>Nombre (*)</strong></h4>
            <input id="nombre" type="text" name="nombre" required="">

            <div class="radio">
                <h4><strong>Edad</strong></h4>
                <input type="radio" name="edad" id="cachorro" value="Cachorro"/>
                <label for="cachorro">Cachorro (- 1 año)</label>
                    
                <input type="radio" name="edad" id="joven" value="Adulto joven"/>
                <label for="joven">Adulto joven (1 a 4 años)</label>
                    
                <input type="radio" name="edad" id="adulto" value="Adulto"/>
                <label for="adulto">Adulto (5 a 9 años)</label>
                    
                <input type="radio" name="edad" id="viejito" value="Viejito"/>
                <label for="viejito">Viejito (+ 10 años)</label>
            </div>

            <div class="radio">
                <h4><strong>Sexo</strong></h4>
                <input type="radio" name="sexo" id="hembra" value="Hembra"/>
                <label for="hembra">Hembra</label>
                    
                <input type="radio" name="sexo" id="macho" value="Macho"/>
                <label for="macho">Macho</label>
            </div>

            <h4><strong>Particularidad</strong></h4>
            <textarea id="particularidad" name="particularidad" rows="5" cols="30"></textarea>

            <div class="checkbox">
                <h4><strong>Referencias</strong></h4>
                <input type="checkbox" name="referencias" id="chicos" value="Se lleva con ninios"/>
                <label for="chicos" class="referencias">Se lleva con niños</label>
                    
                <input type="checkbox" name="referencias" id="perros" value="Se lleva con perros"/>
                <label for="perros" class="referencias">Se lleva con perros</label>
                    
                <input type="checkbox" name="referencias" id="cuidados" value="Cuidados especiales"/>
                <label for="cuidados" class="referencias">Cuidados especiales</label>
                    
                <input type="checkbox" name="referencias" id="discapacitado" value="Discapacitado"/>
                <label for="discapacitado" class="referencias">Discapacitado</label>
                    
                <input type="checkbox" name="referencias" id="caracter" value="Caracter especial"/>
                <label for="caracter" class="referencias">Caracter especial</label>
            </div>
            <div class="radio">
                <h4><strong>Tamaño (*)</strong></h4>     
                <input type="radio" name="tamanio" id="chico" value="Chico"/>
                <label for="chico">Pequeño</label>
                    
                <input type="radio" name="tamanio" id="mediano" value="Mediano"/>
                <label for="mediano">Mediano</label>
                    
                <input type="radio" name="tamanio" id="grande" value="Grande"/>
                <label for="grande">Grande</label>
            </div>

            <h4><strong>Peso</strong></h4>
            <input type="number" id="peso" name="peso" step="0.1" min="0" max="80">

            <h4><strong>Raza (*)</strong></h4>
            <select id="raza_select" name="select_raza">
                <option value="vacio">Selecione una raza...</option> 
                {foreach $raza as $fila}
                    <option value="{$fila['nombre']}">{$fila['nombre']}</option> 
                {/foreach}
            </select>
            <p>(*) Campos obligatorios </p>
            <div id="boton">
                <input type="button" class="btn" name="alta" value="Dar de alta">
            </div>
        </form>
    </section>
{/block}