{extends file="base.tpl"}

{block name=paginado}
	<section id="paginacion-centrada">
{* esto cambia todo despues, ahora lo dejo así solo por la vista *}
		<ul id="ul-paginacion">
			<li><a href="perdidos.php?pag={{$pag-1}}">&laquo;</a></li>
			{*<li><a href="{$pagina}?{$var}={$valor}">{$nro}</a></li>*}	
			{for $nro=1 to $cantidad}
		    	{if $nro == $pag}
		    		<li><a class="active" href="{$url|cat:{$nro}}">{$nro}</a></li>
		    	{else}
		    		<li><a href="{$url|cat:{$nro}}">{$nro}</a></li>
				{/if}	
		    {/for}
			{*<li><a class="active" href="{$url|cat:{$pag}}">{$pag}</a></li>*}
			<li><a href="perdidos.php?pag={{$pag+1}}">&raquo;</a></li>
		</ul>
	</section>
{/block}