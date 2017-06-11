<?php 
//esta linea necesito yo (jasmin)
require('Smarty.class.php');

//include_once("vendor/autoload.php");
include_once('../controlador/SesionControlador.php');

class login {

	private $smarty;
	function __construct() {
		$this->smarty = new SmartyBC();
		//esta linea necesito yo (jasmin)
		$this->smarty->template_dir = 'C:/xampp/htdocs/Paw-Integrador/codigo/vista/templates';
		//esta linea necesito yo (jasmin)
		$this->smarty->compile_dir = 'C:/xampp/Smarty/templates_c';
		$this->smarty->assign('pageTitle', 'Login');
	}

	/*function display() {
		$this->smarty->display("index.tpl");
	}

	function __construct($templateDir = './templates') {
		$this->smarty = new Smarty();
		$this->smarty->addTemplateDir($templateDir);
		$this->smarty->assign('pageTitle', 'Login');
	}*/

	function display($templateFile) {
		$this->smarty->display($templateFile);
	}

	function assign($name, $value) {
		$this->smarty->assign($name, $value);
	}


}

$tpl = new login();
$haySesion = SesionControlador::haySesion();
$tpl->assign('haySesion', $haySesion);
if ($haySesion) {
	$usuario = SesionControlador::getSesion();
	$tpl->assign('usuario', $usuario);
}
$tpl->display("login.tpl");