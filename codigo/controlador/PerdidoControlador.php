<?php
include_once '../DAO/PerdidoDAO.php';
include_once '../modelo/Perdido.php';
include_once '../extras/variedades.php';

class PerdidoControlador {

	public static function getPerdidos() {
		$resultado = PerdidoDAO::obtenerPerdidos();
		//LO QUE ESTA COMENTADO ES PARA QUE EN LA 
		//BD QUEDE SOLO EL NOMBRE DE LA FOTO (CON LA EXTENSION)
		//Y ACA SE LE AGREGUE EL RESTO DEL PATH CON ESTA FUNCION
		/*foreach ($resultado as $fila) {
			$path = concatenarPath($fila['foto'], 'perdidos');
			echo $path;
			$fila['foto'] = $path;
		}
		foreach ($resultado as $fila) {
			echo $fila['foto'];
		}*/
		return $resultado;
	}

}