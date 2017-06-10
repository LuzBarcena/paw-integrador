<?php
/* Smarty version 3.1.31, created on 2017-06-09 16:08:31
  from "/var/www/html/paw-integrador/codigo/vista/templates/registrarse.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_593af22fd9be69_76868005',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'bb395c577478d72a6ea618de24603d8a5ea83aa6' => 
    array (
      0 => '/var/www/html/paw-integrador/codigo/vista/templates/registrarse.tpl',
      1 => 1497013673,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_593af22fd9be69_76868005 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>



<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_802346641593af22fd8d362_85052815', 'head');
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_236375738593af22fd92a58_47616527', 'section');
?>


<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, "base.tpl");
}
/* {block 'head'} */
class Block_802346641593af22fd8d362_85052815 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'head' => 
  array (
    0 => 'Block_802346641593af22fd8d362_85052815',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Registro</title>
	<link rel="stylesheet" type="text/css" href="css/registrarse.css">
	<link rel="stylesheet" type="text/css" href="css/estilosgenerales.css">
	<?php echo '<script'; ?>
 type="text/javascript" src="js/jquery-3.2.1.min.js"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 type="text/javascript" src="js/validaciones.js"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 type="text/javascript" src="js/jsgenerales.js"><?php echo '</script'; ?>
>
<?php
}
}
/* {/block 'head'} */
/* {block 'section'} */
class Block_236375738593af22fd92a58_47616527 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'section' => 
  array (
    0 => 'Block_236375738593af22fd92a58_47616527',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

	<section id="contenedor_registro">
		<!-- onsubmit="return validar();" -->
		<form class="formulario_registro" method="post" action="../controlador/validarRegistro.php" onsubmit="return validar();">
	    	<div class="container">
	    		<h1>REGISTRARSE</h1>
	    		<label><b>Nombre de usuario</b></label>
				<input type="text" min="3" max="30" placeholder="Ingrese nombre de usuario" name="nombre_usuario" required>
				<label><b>Email</b></label>
				<input type="email" min="11" max="50" placeholder="Ingrese email" name="email" onchange="" required>
				<label><b>Contraseña</b></label>
				<input type="password" min="6" max="30" placeholder="Ingrese contraseña" name="contrasenia" onchange="" required>
				<label><b>Repita contraseña</b></label>
				<input type="password" min="6" max="30" placeholder="Ingrese contraseña" name="contrasenia2" onchange="" required>
				<label><b>Nombre</b></label>
				<input type="text" min="3" max="50" placeholder="Ingrese su nombre" name="nombre" onchange="" required>
				<label><b>Apellido</b></label>
				<input type="text" min="3" max="50" placeholder="Ingrese su apellido" name="apellido" onchange="" required>
				<label><b>Fecha de nacimiento</b></label>
				<input type="date" min="01-01-1930" placeholder="Fecha" name="fecha_nacimiento" onchange="" required>
				<div class="botones">
					<button type="submit" class="registro">Registrarse</button>
				</div>
			</div>
		</form>
	</section>
<?php
}
}
/* {/block 'section'} */
}
