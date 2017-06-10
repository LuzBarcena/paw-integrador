<?php
/* Smarty version 3.1.31, created on 2017-06-09 20:56:09
  from "/var/www/html/paw-integrador/codigo/vista/templates/base.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_593b359947b9f3_98888926',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '46212c8fda1eb38dcc2873c48daf9f5103b171ad' => 
    array (
      0 => '/var/www/html/paw-integrador/codigo/vista/templates/base.tpl',
      1 => 1497047940,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:head.tpl' => 1,
  ),
),false)) {
function content_593b359947b9f3_98888926 (Smarty_Internal_Template $_smarty_tpl) {
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

		
		<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1392356904593b3599471ac3_88040664', 'sesion');
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
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1420468428593b3599475757_26520457', 'section');
?>


	<footer>	
		<p>Soy footer</p>
	</footer>

	<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_780112462593b3599478668_65934464', 'script');
?>
	
</body>
</html><?php }
/* {block 'sesion'} */
class Block_1392356904593b3599471ac3_88040664 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'sesion' => 
  array (
    0 => 'Block_1392356904593b3599471ac3_88040664',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block 'sesion'} */
/* {block 'section'} */
class Block_1420468428593b3599475757_26520457 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'section' => 
  array (
    0 => 'Block_1420468428593b3599475757_26520457',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block 'section'} */
/* {block 'script'} */
class Block_780112462593b3599478668_65934464 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'script' => 
  array (
    0 => 'Block_780112462593b3599478668_65934464',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block 'script'} */
}
