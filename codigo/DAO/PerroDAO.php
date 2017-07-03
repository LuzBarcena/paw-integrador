<?php 

include_once 'Conexion.php';
include_once '../modelo/Perro.php';

class PerroDAO {
	protected static $conexion;

	private static function getConexion() {
		self::$conexion = Conexion::conectar();
	}

	private static function desconectar() {
		self::$conexion = null;
	}

	public static function obtenerRazas() {
		$query = "SELECT * FROM RAZA";
		self::getConexion();

		$resultado = self::$conexion->prepare($query);

		$resultado->execute();

		if ($resultado->rowCount() > 0) {
			$filas = $resultado->fetchAll();
			self::desconectar();
			return $filas;
		}
		self::desconectar();
		return false;
	}

	public static function guardarPerro($perro) {
		$foto = $perro->getFoto();
		$nombre = $perro->getNombre();
		$edad = ($perro->getEdad() == 'null' ? NULL : $perro->getEdad());
		$sexo = ($perro->getSexo() == 'null' ? NULL : $perro->getSexo());
		$peso = ($perro->getPeso() == 'null' ? NULL : $perro->getPeso());
		$particularidad = $perro->getParticularidad();
		$tamaño = $perro->getTamaño();
		$raza = $perro->getIdRaza();
		$idsreferencias = $perro->getIdReferencia();

		$query = "INSERT INTO perro(foto, nombre, edad, sexo, particularidad, tamanio, peso, id_raza) VALUES (:foto, :nombre, :edad, :sexo, :particularidad, :tamanio, :peso, :id_raza) RETURNING id_perro;";
		
		self::getConexion();
		
		$resultado = self::$conexion->prepare($query);

		$resultado->bindParam(":foto", $foto);
		$resultado->bindParam(":nombre", $nombre);
		$resultado->bindParam(":edad", $edad);
		$resultado->bindParam(":sexo", $sexo);
		$resultado->bindParam(":particularidad", $particularidad);
		$resultado->bindParam(":tamanio", $tamaño);
		$resultado->bindParam(":peso", $peso);
		$resultado->bindParam(":id_raza", $raza);
	
		if ($resultado->execute()) {
			if ($idsreferencias != 'null') {
				$id_perro = $resultado->fetchColumn(); //obtengo el id del perro que se inserto
				//si el perro se inserto bien entonces ahora ingreso sus referencias
				$query = "INSERT INTO perro_referencia(id_perro, id_referencia) VALUES (:idPerro, :idReferencia);";

				foreach ($idsreferencias as $id) {
					$resultado = self::$conexion->prepare($query);
					$resultado->bindParam(":idPerro", $id_perro);
					$resultado->bindParam(":idReferencia", $id);

					if ( ! $resultado->execute() ) {
						return "No se pudo dar de alta alguna referencia del perro.";
					}
				}
			}
			self::desconectar();
			return true;
		} else {
			self::desconectar();
			return "No se pudo dar de alta al perro";
		} 
	}

	public static function getIdReferencias($referencias) {
		$ids = array();
		$query = "SELECT id_referencia FROM referencia WHERE nombre = :nombre;";
		self::getConexion();
		$resultado = self::$conexion->prepare($query);
		
		foreach ($referencias as $ref) {
			//no devuelve nada
			$resultado->bindParam(":nombre", $ref);
			$resultado->execute();
			if ($resultado->rowCount() > 0) {
				$fila = $resultado->fetchColumn();
				self::desconectar();
				$ids[] = $fila;
			}
		}
		return $ids;
	}

	public static function getRaza($nombreRaza) {
		$query = "SELECT id_raza FROM raza where nombre = :nombre;";
		self::getConexion();
		$resultado = self::$conexion->prepare($query);

		$resultado->bindParam(":nombre", $nombreRaza);
		$resultado->execute();
		if ($resultado->rowCount() > 0) {
			$fila = $resultado->fetchColumn();
			self::desconectar();
			return $fila;
		}
		self::desconectar();
		return false;
	}
	
	public static function obtenerFiltrados($final,$raza) {
		self::getConexion();

		//para buscar el id raza;
		if($raza != "Todas"){
			$query = "SELECT id_raza FROM RAZA WHERE nombre = :raza;";
			$resultado = self::$conexion->prepare($query); 
			$resultado->bindParam(":raza", $raza);
			$resultado->execute();
		
			if ($resultado->rowCount() > 0) {
				$filas = $resultado->fetch();
				$id_raza = $filas['id_raza'];
				//SI TENGO EL ID_RAZA HAGO EL SELECT, SI LO DEMAS ES VACIO FILTRO POR RAZA SOLA
				if($final == ""){
					$query = "SELECT * FROM PERRO WHERE id_raza = :raza;";
					$resultado = self::$conexion->prepare($query); 
					$resultado->bindParam(":raza", $id_raza);
					$resultado->execute();
		
					if ($resultado->rowCount() > 0) {
						$filas = $resultado->fetchAll();
						self::desconectar();
						return $filas;
					}
					self::desconectar();
					return false;
				}else{
					$query = "SELECT * FROM PERRO " . $final . " AND id_raza = " . $id_raza . ";";
					$resultado = self::$conexion->prepare($query); 

					$resultado->execute();
		
					if ($resultado->rowCount() > 0) {
						$filas = $resultado->fetchAll();
						self::desconectar();
						return $filas;
					}
					self::desconectar();
					return false;
				}
			}
			self::desconectar();
			return false;	
		}else{
			//SI RAZA ES VACIO, HAGO LA QUERY SIN ELLA
	    	$query = "SELECT * FROM PERRO " . $final . ";";
			$resultado = self::$conexion->prepare($query); 

			$resultado->execute();
		
			if ($resultado->rowCount() > 0) {
				$filas = $resultado->fetchAll();
				self::desconectar();
				return $filas;
			}
			self::desconectar();
			return false;
		}
		
	}

	public static function obtenerNombreRaza($raza) {
		self::getConexion();

		$query = "SELECT nombre FROM RAZA WHERE id_raza = :raza;";
		$resultado = self::$conexion->prepare($query); 
		$resultado->bindParam(":raza", $raza);
		$resultado->execute();
		
		if ($resultado->rowCount() > 0) {
			$filas = $resultado->fetch();
			self::desconectar();
			return $filas['nombre'];
		}	
		self::desconectar();
		return false;
	}

	public static function obtenerReferencias() {
		$query = "SELECT id_referencia, nombre, imagen FROM referencia;";

		self::getConexion();

		$resultado = self::$conexion->prepare($query); 
		$resultado->execute();

		if ($resultado->rowCount() > 0) {
			$filas = $resultado->fetchAll();
			self::desconectar();
			return $filas;
		}	
		self::desconectar();
		return false;
	}

	public static function obtenerPerro($id) {
		$query = "SELECT * FROM PERRO WHERE id_perro = :id";
		self::getConexion();

		$resultado = self::$conexion->prepare($query);
		$resultado->bindParam(":id", $id);
		$resultado->execute();

		if ($resultado->rowCount() > 0) {
			$fila = $resultado->fetch();
			self::desconectar();
			return $fila;
		}	
		self::desconectar();
		return false;
	}

	public static function getReferenciaByIdPerro($idPerro) {
		$query = "SELECT id_referencia FROM perro_referencia WHERE id_perro = :idPerro";
		self::getConexion();

		$resultado = self::$conexion->prepare($query);
		$resultado->bindParam(":idPerro", $idPerro);
		$resultado->execute();

		if ($resultado->rowCount() > 0) {
			$filas = $resultado->fetchAll();
			self::desconectar();
			return $filas;
		}	
		self::desconectar();
		return false;
	}

	public static function getReferenciaById($idReferencia) {
		$query = "SELECT * FROM referencia WHERE id_referencia = :idReferencia";
		self::getConexion();

		$resultado = self::$conexion->prepare($query);
		$resultado->bindParam(":idReferencia", $idReferencia);
		$resultado->execute();

		if ($resultado->rowCount() > 0) {
			$fila = $resultado->fetch();
			self::desconectar();
			return $fila;
		}	
		self::desconectar();
		return false;
	}

}