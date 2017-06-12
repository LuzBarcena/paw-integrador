<?php
/* Smarty version 3.1.31, created on 2017-06-11 21:32:12
  from "/var/www/html/paw-integrador/codigo/vista/templates/index.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_593de10c7819b7_56086482',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '66fe5c497059f8f3cc79cd7a3aedd5e0875e4b88' => 
    array (
      0 => '/var/www/html/paw-integrador/codigo/vista/templates/index.tpl',
      1 => 1497227027,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_593de10c7819b7_56086482 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>



<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_2106611020593de10c7722b7_87174991', 'head');
?>



<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_458895436593de10c7760c4_78943213', 'section');
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1868115754593de10c77f251_17480421', 'script');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "base.tpl");
}
/* {block 'head'} */
class Block_2106611020593de10c7722b7_87174991 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'head' => 
  array (
    0 => 'Block_2106611020593de10c7722b7_87174991',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

	<link rel="stylesheet" type="text/css" href="css/index.css">
<?php
}
}
/* {/block 'head'} */
/* {block 'section'} */
class Block_458895436593de10c7760c4_78943213 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'section' => 
  array (
    0 => 'Block_458895436593de10c7760c4_78943213',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

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
<?php
}
}
/* {/block 'section'} */
/* {block 'script'} */
class Block_1868115754593de10c77f251_17480421 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'script' => 
  array (
    0 => 'Block_1868115754593de10c77f251_17480421',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

	<?php echo '<script'; ?>
 type="text/javascript" src="js/carrusel.js"><?php echo '</script'; ?>
>
<?php
}
}
/* {/block 'script'} */
}
