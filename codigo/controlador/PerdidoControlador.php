<?php
include_once '../DAO/PerdidoDAO.php';
include_once '../modelo/Perdido.php';
include_once '../extras/variedades.php';


class PerdidoControlador {

	public static function getPerdidos($indice, $elementosPorPagina) {
		$resultado = PerdidoDAO::obtenerPerdidos($indice, $elementosPorPagina);

		foreach ($resultado as $key => $fila) {
			$path = concatenarPath($fila['foto'], 'perdidos');
			$path = $path . ".jpg";
			$resultado[$key]['foto'] = $path;
		}
		return $resultado;
	}

	public static function getCantidadPerdidos() {
		return PerdidoDAO::obtenerCantidadPerdidos();
	}

	public static function getPerdido($id){
		$resultado = PerdidoDAO::obtenerUnPerdido($id);
		return $resultado;
	}

	public static function setPerdido($id, $titulo, $descripcion, $foto, $latitud, $longitud){
		//genero un numero aleatorio para guardar el archivo
		$numero = mt_rand();

		$nombre = "perdido" . $numero;


		$filepath = "../vista/img_perdidos/" . $nombre . ".jpg";

		//guardo en el servidor
		if(file_put_contents($filepath, $foto)){
			$resultado = PerdidoDAO::guardarPerdido($id, $titulo, $descripcion, $nombre, $latitud, $longitud);
			return $resultado;
		}
	}

}