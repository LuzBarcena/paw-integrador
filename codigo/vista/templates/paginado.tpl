{extends file="base.tpl"}

{block name=paginado}
	<section id="paginacion-centrada">
{* esto cambia todo despues, ahora lo dejo así solo por la vista *}
		<ul id="ul-paginacion">
			<li><a href="#">&laquo;</a></li>
			<li><a href="{$pagina}?{$var}={$valor}">{$nro}</a></li>	
			{for $nro=1 to $cantidad}
		    	<li><a href="{$pagina}?{$var}={$valor}">{$nro}</a></li>	
		    {/for}
			{*<li><a class="active" href="#">{$nro}</a></li>*}
			<li><a href="#">&raquo;</a></li>
		</ul>
	</section>
{/block}