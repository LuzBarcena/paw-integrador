{extends file="base.tpl"}

{block name=paginado}
	<section id="paginacion-centrada">
{* esto cambia todo despues, ahora lo dejo así solo por la vista *}
		<ul id="ul-paginacion">
			{if $pag-1 == 0 }
		    	<li><a href="perdidos.php?pag={{$cantidad}}">&laquo;</a></li>
		    {else}
		    	<li><a href="perdidos.php?pag={{$pag-1}}">&laquo;</a></li>
			{/if}

			{for $nro=1 to $cantidad}
		    	{if $nro == $pag}
		    		<li><a class="active" href="{$url|cat:{$nro}}">{$nro}</a></li>
		    	{else}
		    		<li><a href="{$url|cat:{$nro}}">{$nro}</a></li>
				{/if}	
		    {/for}

			{if $pag+1 > $cantidad }
		    	<li><a href="perdidos.php?pag=1">&raquo;</a></li>
		    {else}
		    	<li><a href="perdidos.php?pag={{$pag+1}}">&raquo;</a></li>
			{/if}
		</ul>
	</section>
{/block}