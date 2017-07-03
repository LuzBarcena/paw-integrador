<?php
include_once '../DAO/PerdidoDAO.php';
include_once '../modelo/Perdido.php';
include_once '../extras/variedades.php';


class PerdidoControlador {

	public static function getPerdidos($indice, $elementosPorPagina) {
		$resultado = PerdidoDAO::obtenerPerdidos($indice, $elementosPorPagina);
		if($resultado != false){
			foreach ($resultado as $key => $fila) {
				$esSilueta = strpos($fila['foto'], 'silueta');
				if ($esSilueta === false) {
					$path = concatenarPath($fila['foto'], 'perdidos');
					$path = $path . ".jpg";
				} else {
					$path = concatenarPath($fila['foto'], 'siluetas');
					$path = $path . ".png";
				}
				
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

	public static function setPerdido($id, $titulo, $descripcion, $foto, $latitud, $longitud, $fechaAlta, $fechaDesaparicion, $sexo, $nombre, $tipoFoto) {
		if ($tipoFoto == 'foto') {
			//genero un numero aleatorio para guardar el archivo
			$numero = mt_rand();
			$nombreFoto = "perdido" . $numero;
		} else {
			$nombreFoto = $foto;
		}

		$perdido = new Perdido($id, $titulo, $descripcion, $nombreFoto, $latitud, $longitud);
		$perdido->setNombre($nombre);
		$perdido->setSexo($sexo);
		$perdido->setFechaAlta($fechaAlta);
		$perdido->setFechaDesaparicion($fechaDesaparicion);

		if ($tipoFoto == 'foto') {
			$filepath = "../vista/img_perdidos/" . $nombreFoto . ".jpg";
			//guardo en el servidor
			if (file_put_contents($filepath, $foto)){
				return PerdidoDAO::guardarPerdido($perdido);
			}
		} else {
			if ($tipoFoto == 'silueta') {
				return PerdidoDAO::guardarPerdido($perdido);
			}
		}
	}

	public static function chequearUsuario($idUsuario,$idPerro){
		return PerdidoDAO::mismoUsuario($idUsuario, $idPerro);
	}

	public static function setEncontrado($id){
		return PerdidoDAO::marcarEncontrado($id);
	}


}