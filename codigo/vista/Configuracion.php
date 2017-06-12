<?php


class Configuracion {

	public static function getProyecto() {
		return "C:/xampp/htdocs/Paw-Integrador";
	}

	public static function getTemplatesDir() {
		return 'C:/xampp/htdocs/Paw-Integrador/codigo/vista/templates';
	}

	public static function getSmarty() {
		return require('Smarty.class.php');
	}

	public static function getCompileDir() {
		return 'C:/xampp/Smarty/templates_c';
	}

}