<?php

class Config {

	public static function getProyecto() {
		return "";
	}

	public static function getTemplatesDir() {
		return "../vista/templates/";
	}

	public static function autoload() {
		include_once("../vista/vendor/autoload.php");
	}

	public static function getCompileDir() {
		return "../vista/templates_c/";
	}

}