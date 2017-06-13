<?php
/* Smarty version 3.1.31, created on 2017-06-11 21:32:08
  from "/var/www/html/paw-integrador/codigo/vista/templates/base.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_593de108c87ca4_56950277',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '46212c8fda1eb38dcc2873c48daf9f5103b171ad' => 
    array (
      0 => '/var/www/html/paw-integrador/codigo/vista/templates/base.tpl',
      1 => 1497227027,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:head.tpl' => 1,
    'file:sesion.tpl' => 1,
  ),
),false)) {
function content_593de108c87ca4_56950277 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, false);
?>
<!DOCTYPE html>
<html lang="es">
<?php $_smarty_tpl->_subTemplateRender("file:head.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<body>
	<header>
		<img src="img/logo.png" alt="Logo de la página">
		<?php $_smarty_tpl->_subTemplateRender("file:sesion.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

	</header>
	
	<nav>
		<ul class="topnav" id="myTopnav">
			<li><a href="index.php">Inicio</a></li>
			<li><a href="">Perros</a></li>
			<li><a href="">Perdidos</a></li>
			<li><a href="">Noticias</a></li>
			<li><a href="">Tienda</a></li>
			<a class="icon" onclick="menu()">&#9776;</a>
		</ul>
	</nav>
	
	<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_2016310984593de108c79b05_86456989', 'section');
?>


	<footer>	
		<p>Soy footer</p>
	</footer>

	<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_934017261593de108c800c9_48677350', 'script');
?>
	
</body>
</html><?php }
/* {block 'section'} */
class Block_2016310984593de108c79b05_86456989 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'section' => 
  array (
    0 => 'Block_2016310984593de108c79b05_86456989',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block 'section'} */
/* {block 'script'} */
class Block_934017261593de108c800c9_48677350 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'script' => 
  array (
    0 => 'Block_934017261593de108c800c9_48677350',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block 'script'} */
}
