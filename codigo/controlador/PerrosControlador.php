<?php
include_once '../DAO/PerroDAO.php';
include_once '../modelo/Perro.php';
include_once '../extras/variedades.php';

class PerrosControlador {

	public static function getRazas(){
		$resultado = PerroDAO::obtenerRazas();
		return $resultado;
	}

	public static function setPerro($foto, $nombre, $edad, $sexo, $particularidad, $tamaño, $peso, $referencias, $raza){
		//genero un numero aleatorio para guardar el archivo
		$numero = mt_rand();
		$nombreFoto = "perro" . $numero;

		$filepath = "../vista/img_perros/" . $nombreFoto . ".jpg";
		$perro = new Perro($nombreFoto, $nombre, $edad, $sexo, $particularidad, $tamaño, $peso, $raza);
		$perro->setApadrinante(NULL);
		$perro->setAdoptante(NULL);

		$idRaza = self::getRaza($raza);
		if ($idRaza == false) {
			return false;
		} else {
			$perro->setIdRaza($idRaza);
		}
		if ($referencias != 'null') {
			$arrayreferencia = self::getIdReferencias($referencias);		
			$perro->setIdReferencia($arrayreferencia);
		} else {
			$perro->setIdReferencia('null');
		}
		//guardo en el servidor LA FOTO ME LA GUARDA
		if (file_put_contents($filepath, $foto)) {
			return PerroDAO::guardarPerro($perro);
		} else {
			return false;
		}
		
	}

	private static function getRaza($raza) {
		return PerroDAO::getRaza($raza);
	}

	private static function getIdReferencias($referencias) {
		return PerroDAO::getIdReferencias($referencias);
	}
	
	
	public static function enviarFiltros($final,$raza){
		$resultado = PerroDAO::obtenerFiltrados($final,$raza);
		return $resultado;
	}

	public static function getNombreRaza($raza){
		$resultado = PerroDAO::obtenerNombreRaza($raza);
		return $resultado;
	}

	public static function getReferencias() {
		$resultado = PerroDAO::obtenerReferencias();
		return $resultado;
	}

	public static function getPerro($id) {
		$resultado = PerroDAO::obtenerPerro($id);
		return $resultado;
	}

	public static function getReferenciasByIdPerro($idPerro) {
		$resultado = PerroDAO::getReferenciaByIdPerro($idPerro);
		return $resultado;
	}

	public static function getReferenciasById($idReferencia) {
		$resultado = PerroDAO::getReferenciaById($idReferencia);
		return $resultado;
	}

    public static function getAdoptados($usuario) {
        return PerroDAO::devolverAdoptados($usuario);
    }

    public static function getApadrinados($usuario) {
        return PerroDAO::devolverApradrinados($usuario);
    }

    public static function setAdopcion($usuario, $perro) {
        return PerroDAO::adoptar($usuario, $perro);
    }

    public static function setApadrinacion($usuario, $perro) {
        return PerroDAO::apadrinar($usuario, $perro);
    }
}