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
		$adoptante = $perro->getAdoptante();
		$apadrinante = $perro->getApadrinante();
		$particularidad = $perro->getParticularidad();
		$tamaño = $perro->getTamaño();
		$raza = $perro->getIdRaza();
		$idsreferencias = $perro->getIdReferencia();

		$query = "INSERT INTO perro(foto, nombre, edad, sexo, particularidad, tamanio, peso, id_raza, id_adoptante, id_apadrinante) VALUES (:foto, :nombre, :edad, :sexo, :particularidad, :tamanio, :peso, :id_raza, :adoptante, :apadrinante) RETURNING id_perro;";
		
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
		$resultado->bindValue(":apadrinante", $apadrinante, PDO::PARAM_NULL);
		$resultado->bindValue(":adoptante", $adoptante, PDO::PARAM_NULL);
	
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
	
	public static function obtenerFiltrados($tamanio, $sexo, $edad, $raza, $contarMostrados) {
		$data = "";
		$vtamanio = "";
		$vsexo = "";
		$vedad = "";

		//PARA PONER EL WHERE
		if(sizeof($tamanio) > 0){
			$data = $data . "where ";
		}else{
			if(sizeof($sexo) > 0){
				$data = $data . "where";
			}else{
				if(sizeof($edad) > 0){
					$data = $data . "where";
				}else{
					$data = $data . "where id_adoptante is null";
				}
			}
		}

		//VOY ARMANDO LA QUERY
		//tamanio
		for ($i = 0; $i < sizeof($tamanio); $i++) {
			if($i > 0){
				$vtamanio = $vtamanio . " OR tamanio = " . "'" . $tamanio[$i] . "'";
			}else{
				$vtamanio = "(tamanio = " . "'" . $tamanio[$i] . "'";
			}
		}
		if (sizeof($tamanio) > 0){
			$vtamanio = $vtamanio . ")";
		}

		//sexo
		for ($i = 0; $i < sizeof($sexo); $i++) {
			if($i > 0){
				$vsexo = $vsexo . " OR sexo = " . "'" . $sexo[$i] . "'";
			}else{
				$vsexo = "(sexo = " . "'" . $sexo[$i] . "'";
			}
		}
		if (sizeof($sexo) > 0){
			$vsexo = $vsexo . ")";
		}

		//edad
		for ($i = 0; $i < sizeof($edad); $i++) {
			if($i > 0){
				$vedad = $vedad . " OR edad = " . "'" . $edad[$i] . "'";
			}else{
				$vedad = "(edad = " . "'" . $edad[$i] . "'";
			}
		}
		if (sizeof($edad) > 0){
			$vedad = $vedad . ")";
		}
	

		$array = array();

		//PARA PONER EL AND
		if($vtamanio != ""){
			array_push($array, $vtamanio);
		}
		if($vsexo != ""){
			array_push($array, $vsexo);
		}
		if($vedad != ""){
			array_push($array, $vedad);
		}

		for($i = 0; $i < sizeof($array); $i++){
			if($i < sizeof($array)-1){
				$array[$i] = $array[$i] . " AND ";
			}
		}

		$final = $data;
		for($i = 0; $i < sizeof($array); $i++){
			$final = $final . $array[$i];
		}

		self::getConexion();
		$resultadosPorPagina = 4;
		$queryLimite = "limit $resultadosPorPagina offset " . intval($resultadosPorPagina * $contarMostrados);

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
					$query = "SELECT * FROM PERRO WHERE id_raza = :raza" . " AND id_adoptante is null" . " $queryLimite;";
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
					$query = "SELECT * FROM PERRO " . $final . " AND id_raza = " . $id_raza . " AND id_adoptante is null". " $queryLimite;";
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
	    	$query = "SELECT * FROM PERRO " . $final . " AND id_adoptante is null" . " $queryLimite;";
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

	public static function devolverAdoptados($usuario) {
		self::getConexion();

		$query = "SELECT * FROM PERRO WHERE id_adoptante = :adoptante;";
		$resultado = self::$conexion->prepare($query); 
		$resultado->bindParam(":adoptante", $usuario);
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

	public static function devolverApradrinados($usuario) {
		self::getConexion();

		$query = "SELECT * FROM PERRO WHERE id_apadrinante = :apadrinante;";
		$resultado = self::$conexion->prepare($query); 
		$resultado->bindParam(":apadrinante", $usuario);
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

	public static function adoptar($usuario, $perro) {
		self::getConexion();
		$apadrinante = NULL;

		//busco el perro con el id y si no tiene adoptante, lo marco como adoptado y le saco el id apadrinante
		$query = "UPDATE PERRO SET id_adoptante = :usuario, id_apadrinante = :apadrinante WHERE id_perro = :perro AND id_adoptante is null;";
		$resultado = self::$conexion->prepare($query); 
		$resultado->bindParam(":perro", $perro);
		$resultado->bindParam(":usuario", $usuario);
		$resultado->bindValue(":apadrinante", $apadrinante, PDO::PARAM_NULL);
		$resultado->execute();
		
		if ($resultado->rowCount() > 0) {
			self::desconectar();
			return true;
		}	
		self::desconectar();
		return false;
	}

	public static function apadrinar($usuario, $perro) {
		self::getConexion();

		//busco el perro con el id y si no tiene adoptante, lo marco como apadrinado 
		$query = "UPDATE PERRO SET id_apadrinante = :usuario WHERE id_perro = :perro AND id_adoptante is null AND id_apadrinante is null ;";
		$resultado = self::$conexion->prepare($query); 
		$resultado->bindParam(":perro", $perro);
		$resultado->bindParam(":usuario", $usuario);
		$resultado->execute();
		
		if ($resultado->rowCount() > 0) {
			self::desconectar();
			return true;
		}	
		self::desconectar();
		return false;
	}

}