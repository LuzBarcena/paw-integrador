<?php 
//esta linea necesito yo (jasmin)
//require('Smarty.class.php');

require_once("vendor/autoload.php");

class login {

	private $smarty;

	function __construct() {
		$this->smarty = new SmartyBC();
		//esta linea necesito yo (jasmin)
		//$this->smarty->template_dir = 'C:/xampp/htdocs/Paw-Integrador/codigo/vista/templates';
		//esta linea necesito yo (jasmin)
		//$this->smarty->compile_dir = 'C:/xampp/Smarty/templates_c';
		$this->smarty->addTemplateDir('./templates');
	}

	function display() {
		$this->smarty->display("login.tpl");
	}


}

$tpl = new login();
$tpl->display();