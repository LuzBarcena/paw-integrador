<?php 

class Validador {

	/**
	 * Funcion para validar y limpiar un campo
	 * @param  [input] $campo [tiene que ser tipo post]
	 * @return [string]
	 */
	public static function validar_campo($campo) {
	    //trim es para limpiar el campo, principio y final
	    $campo = trim($campo);
	    //stripcslashes elimina las barras /\
	    $campo = stripcslashes($campo);
	    //limpia todas las etiquetas de los campos
	    $campo = htmlspecialchars($campo);

	    return $campo;
	}

	


}