<?php
include_once '../DAO/PerdidoDAO.php';
include_once '../modelo/Perdido.php';
include_once '../extras/variedades.php';


class PerdidoControlador {

	public static function getPerdidos($indice, $elementosPorPagina) {
		$resultado = PerdidoDAO::obtenerPerdidos($indice, $elementosPorPagina);
		if($resultado != false){
			foreach ($resultado as $key => $fila) {
				$path = concatenarPath($fila['foto'], 'perdidos');
				$path = $path . ".jpg";
				$resultado[$key]['foto'] = $path;
			}
		}
		return $resultado;
	}

	public static function getCantidadPerdidos() {
		return PerdidoDAO::obtenerCantidadPerdidos();
	}

	public static function getPerdido($id){
		return PerdidoDAO::obtenerUnPerdido($id);
	}

	public static function setPerdido($id, $titulo, $descripcion, $foto, $latitud, $longitud, $fechaAlta, $fechaDesaparicion, $sexo, $nombre){
		//genero un numero aleatorio para guardar el archivo
		$numero = mt_rand();
		$nombreFoto = "perdido" . $numero;

		$perdido = new Perdido($id, $titulo, $descripcion, $nombreFoto, $latitud, $longitud);
		$perdido->setNombre($nombre);
		$perdido->setSexo($sexo);
		$perdido->setFechaAlta($fechaAlta);
		$perdido->setFechaDesaparicion($fechaDesaparicion);

		$filepath = "../vista/img_perdidos/" . $nombreFoto . ".jpg";
		//guardo en el servidor
		if (file_put_contents($filepath, $foto)){
			return PerdidoDAO::guardarPerdido($perdido);
		}
	}

}