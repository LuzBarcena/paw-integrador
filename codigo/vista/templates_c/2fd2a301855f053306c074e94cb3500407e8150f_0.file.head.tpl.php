<?php
/* Smarty version 3.1.31, created on 2017-06-09 21:10:58
  from "/var/www/html/paw-integrador/codigo/vista/templates/head.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_593b391233ccf1_19759371',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2fd2a301855f053306c074e94cb3500407e8150f' => 
    array (
      0 => '/var/www/html/paw-integrador/codigo/vista/templates/head.tpl',
      1 => 1497053454,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_593b391233ccf1_19759371 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, false);
?>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>$pageTitle</title>
<link rel="stylesheet" type="text/css" href="css/estilosgenerales.css">
<?php echo '<script'; ?>
 type="text/javascript" src="js/jquery-3.2.1.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" src="js/jsgenerales.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" src="js/validaciones.js"><?php echo '</script'; ?>
>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_764465981593b39123397d6_11440976', 'head');
}
/* {block 'head'} */
class Block_764465981593b39123397d6_11440976 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'head' => 
  array (
    0 => 'Block_764465981593b39123397d6_11440976',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block 'head'} */
}
