{extends file="base.tpl"}

{block name=paginado}
	<section id="paginacion-centrada">
{* esto cambia todo despues, ahora lo dejo así solo por la vista *}
		<ul id="ul-paginacion">
			<li><a href="#">&laquo;</a></li>
	    	<li><a href="#">1</a></li>
			<li><a class="active" href="#">2</a></li>
			<li><a href="#">3</a></li>
			<li><a href="#">4</a></li>
			<li><a href="#">5</a></li>
			<li><a href="#">6</a></li>
			<li><a href="#">7</a></li>
			<li><a href="#">&raquo;</a></li>
		</ul>
	</section>
{/block}