<?php
/* Smarty version 3.1.31, created on 2017-06-11 21:32:08
  from "/var/www/html/paw-integrador/codigo/vista/templates/sesion.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_593de108de1414_74047658',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '068cd4d6be90a5dd57625391e9c21e3885eaa6cc' => 
    array (
      0 => '/var/www/html/paw-integrador/codigo/vista/templates/sesion.tpl',
      1 => 1497227027,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_593de108de1414_74047658 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, false);
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1676253130593de108dbd9a7_80565695', 'sesion');
}
/* {block 'sesion'} */
class Block_1676253130593de108dbd9a7_80565695 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'sesion' => 
  array (
    0 => 'Block_1676253130593de108dbd9a7_80565695',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

	<?php ob_start();
echo $_smarty_tpl->tpl_vars['haySesion']->value;
$_prefixVariable1=ob_get_clean();
if ($_prefixVariable1) {?>
		<p id="nombreSesion"> Usuario <?php echo $_smarty_tpl->tpl_vars['usuario']->value;?>
</p>
		<form class="form-sesion-registro" action="../controlador/handler.php" method="POST">
			<input class="btn-sesion-registro" type="submit" name="cerrarSesion" value="Cerrar Sesión">
		</form>
	<?php } else { ?>
		<form class="form-sesion-registro" action="../controlador/handler.php" method="POST">
			<input class="btn-sesion-registro" type="submit" name="iniciarSesion" value="Iniciar Sesión">
			<input class="btn-sesion-registro" type="submit" name="registrarse" value="Registrarse">
		</form>
	<?php }
}
}
/* {/block 'sesion'} */
}
