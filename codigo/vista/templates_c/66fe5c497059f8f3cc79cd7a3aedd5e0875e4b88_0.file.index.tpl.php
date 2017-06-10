<?php
/* Smarty version 3.1.31, created on 2017-06-09 20:56:09
  from "/var/www/html/paw-integrador/codigo/vista/templates/index.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_593b359930a427_26617571',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '66fe5c497059f8f3cc79cd7a3aedd5e0875e4b88' => 
    array (
      0 => '/var/www/html/paw-integrador/codigo/vista/templates/index.tpl',
      1 => 1497048135,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_593b359930a427_26617571 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>



<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1752727085593b35992fa424_76740958', 'head');
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1583074494593b35992fea61_28415215', 'section');
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1174647458593b3599307a88_10638362', 'script');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "base.tpl");
}
/* {block 'head'} */
class Block_1752727085593b35992fa424_76740958 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'head' => 
  array (
    0 => 'Block_1752727085593b35992fa424_76740958',
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
class Block_1583074494593b35992fea61_28415215 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'section' => 
  array (
    0 => 'Block_1583074494593b35992fea61_28415215',
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
class Block_1174647458593b3599307a88_10638362 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'script' => 
  array (
    0 => 'Block_1174647458593b3599307a88_10638362',
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
