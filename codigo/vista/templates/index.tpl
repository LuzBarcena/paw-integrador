{extends file="base.tpl"}


{block name=head}
	<link rel="stylesheet" type="text/css" href="css/index.css">
{/block}


{block name=section}
	<section>
		<div class="carrusel">
			<div class="slideshow-container">
	  			<div class="mySlides fade">
	    			<div class="numbertext">1 / 3</div>
	    			<img class="img-carrusel" src="img/carrusel1.jpg" style="width:100%;">
	  			</div>

	  			<div class="mySlides fade">
	    			<div class="numbertext">2 / 3</div>
	    			<img class="img-carrusel" src="img/carrusel2.jpg" style="width:100%">
	  			</div>

		  		<div class="mySlides fade">
	    			<div class="numbertext">3 / 3</div>
	    			<img class="img-carrusel" src="img/carrusel3.jpg" style="width:100%">
	  			</div>

	  			<a class="prev" onclick="plusSlides(-1)">&#10094;</a>
	  			<a class="next" onclick="plusSlides(1)">&#10095;</a>
			</div>
			<br>

			<div style="text-align:center">
	  			<span class="dot" onclick="currentSlide(1)"></span> 
	  			<span class="dot" onclick="currentSlide(2)"></span> 
	  			<span class="dot" onclick="currentSlide(3)"></span> 
			</div>
		</div>
	</section>

	<section class="descripcion">
		<p>
			<cite>
				Un perro no busca autos grandes, casas lujosas o ropa de diseñadores. Con agua y comida estará bien. 
				No les importa si eres pobre o rico. Listo o tonto. Inteligente o estúpido. Dale tu corazón y el te dará el suyo.
				¿Cuántas personas pueden hacerte sentir así, puro y especial? ¿Cuántas personas pueden hacerte sentir extraordinario?
			</cite>
		</p>	
	</section>
{/block}

{block name=script}
	<script type="text/javascript" src="js/carrusel.js"></script>
{/block}