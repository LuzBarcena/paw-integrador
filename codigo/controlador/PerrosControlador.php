<?php
include_once '../DAO/PerroDAO.php';
include_once '../modelo/Perro.php';
include_once '../extras/variedades.php';

class PerrosControlador {

	public static function getRazas(){
		$resultado = PerroDAO::obtenerRazas();
		return $resultado;
	}


}