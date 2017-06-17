{extends file="base.tpl"}

{block name=head}
	<link rel="stylesheet" type="text/css" href="css/perdidos.css">
{/block}

{block name=section}
        {foreach $resultados as $resultado}
        	<article>
 				<header>
    				<h3>{$resultado['titulo']}</h3>
  				</header>
  				<div>
  					<p>{$resultado['descripcion']}</p>
  				</div>
  				<div>
  					<p>{$resultado['foto']}</p>
  				</div>
  				<div>
  					<p>{$resultado['info_contacto']}</p>
  				</div>
  				<div>
  					<p>{$resultado['ultima_direccion']}</p>
  				</div>
			</article>
		{/foreach}
{/block}