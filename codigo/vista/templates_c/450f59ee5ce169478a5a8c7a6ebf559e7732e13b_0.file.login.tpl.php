<?php
/* Smarty version 3.1.31, created on 2017-06-10 19:21:51
  from "/var/www/html/paw-integrador/codigo/vista/templates/login.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_593c70ffa46662_03963978',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '450f59ee5ce169478a5a8c7a6ebf559e7732e13b' => 
    array (
      0 => '/var/www/html/paw-integrador/codigo/vista/templates/login.tpl',
      1 => 1497130242,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_593c70ffa46662_03963978 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1071556247593c70ffa36148_80623688', 'head');
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_111229965593c70ffa3cb40_78371550', 'section');
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, "base.tpl");
}
/* {block 'head'} */
class Block_1071556247593c70ffa36148_80623688 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'head' => 
  array (
    0 => 'Block_1071556247593c70ffa36148_80623688',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

	<link rel="stylesheet" type="text/css" href="css/login.css">
<?php
}
}
/* {/block 'head'} */
/* {block 'section'} */
class Block_111229965593c70ffa3cb40_78371550 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'section' => 
  array (
    0 => 'Block_111229965593c70ffa3cb40_78371550',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

	<section class="section-login">
		<form class="formulario_login" action="../controlador/validarUsuario.php" method="POST" onsubmit="return validarIniciarSesion();">
			<div class="container">
				<h1>INICIAR SESIÓN</h1>
				<label for="usuario"><b>Usuario</b></label>
				<input type="text" id="usuario" name="nombre_usuario" placeholder="Ingrese usuario" required>
				<label for="contrasenia"><b>Contraseña</b></label>
				<input type="password"  id="contrasenia" placeholder="Ingrese password" name="contrasenia" required>
				<div class="botones">
					<input type="submit" id="iniciarSesion" name="iniciarSesion" value="Iniciar Sesión">
				</div>
			</div>
		</form>
	</section>
<?php
}
}
/* {/block 'section'} */
}
