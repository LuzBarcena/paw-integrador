<?php 

class Validador {

	/**
	 * Funcion para validar y limpiar un campo
	 * @param  [input] $campo [tiene que ser tipo post]
	 * @return [string]
	 */
	public static function limpiarCampo($campo) {
	    //trim es para limpiar el campo, principio y final
	    $campo = trim($campo);
	    //stripcslashes elimina las barras /\
	    $campo = stripcslashes($campo);
	    //limpia todas las etiquetas de los campos
	    $campo = htmlspecialchars($campo);

	    return $campo;
	}

	public static function validarLongitud($campo, $maxLongitud) {
		if (strlen($campo) < 3) {
			echo "Muy corto <br>";
			return false;
		}
		if (strlen($campo) > $maxLongitud) {
			echo "Muy largo <br>";
			return false;
		}
		echo "todo bien long <br>";
		return true;
	}

	public static function sinEspacios($campo) {
		 return (str_word_count($campo) > 1) ? false : true;
	}

	public static function esMail($mail) {
		if (filter_var($mail, FILTER_VALIDATE_EMAIL)) {
			echo "es mail <br>";
			return true;
		} else {
			echo "no es mail<br>";
			return false;
		}
	}

	//fecha no posterior a hoy
	public static function fechaValida($fecha) {
		//$fecha = "2004-02-29"; 
		$fecha2 = strtotime ($fecha); 
		if ($fecha2 < time() ) { 
			echo "fecha correcta<br>";
			return true; 
		} 
		else { 
			echo "fecha incorrecta<br>";
			return false; 
		}  
	}

	public static function contraseniasIguales($contrasenia1, $contrasenia2) {
		return ($contrasenia1 === $contrasenia2) ? true: false;
	}

	public static function letrasNumeros($campo, $opcion) {
		//compruebo que los caracteres sean los permitidos
		switch ($opcion) {
			case 'letras':
				$permitidos = "áéíóúabcdefghijklmnñopqrstuvwxyzABCDEFGHIJKLMNÑOPQRSTUVWXYZ";
				break;
			case 'letrasynumeros':
				$permitidos = "áéíóúabcdefghijklmnñopqrstuvwxyzABCDEFGHIJKLMNÑOPQRSTUVWXYZ0123456789";
				break;
		}
		for ($i = 0; $i < strlen($campo); $i++) { 
			if (strpos($permitidos, substr($campo, $i, 1)) === false) { 
				echo "hay un caracter no permitido<br>";
				return false; 
			} 
		} 
		echo "valido<br>";
		return true;
	}
}