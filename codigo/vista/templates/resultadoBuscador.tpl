{block name=perros}
    <section id="lista_perdidos">
        {if $resultado != false}    
            {foreach $resultado as $fila}
                <div class="card">
                    <img class="foto_perros" src="img_perros/{$fila['foto']}" alt="Perro" style="width:100%">
                    <div class="container">
                        <h4><b>{$fila['nombre']}</b></h4> 
                    </div>
                    <a class="link leerMas" href="perroIndividual.php?id={$fila['id_perro']}">Leer más</a>
                </div>
            {/foreach}
            <div>
                <button type="button" class="link" onclick="mostrarMas();">Mostrar más</button>
            </div>
        {else}
            <h3>No hay resultados</h3>
        {/if}
    </section>
{/block}