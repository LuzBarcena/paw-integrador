<?php

session_start();

class SesionControlador {

	public static function setSesion($nombre_sesion) {
		$_SESSION['login'] = $nombre_sesion;
	}

	public static function getSesion() {
		return $_SESSION['login'];
	}

	public static function haySesion() {
		return isset($_SESSION["login"]);
	}

	public static function destruirSesion() {
		return session_destroy();
	}

}