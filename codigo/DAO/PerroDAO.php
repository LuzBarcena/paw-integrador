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
		$edad = $perro->getEdad();
		$sexo = $perro->getSexo();
		$particularidad = $perro->getParticularidad();
		$tamaño = $perro->getTamaño();
		$peso = $perro->getPeso();
		$raza = 1;
		$id_referencia = 1;

		$query = "INSERT INTO perro(foto, nombre, edad, sexo, particularidad, tamanio, peso, id_raza, id_referencia) VALUES (:foto, :nombre, :edad, :sexo, :particularidad, :tamanio, :peso, :id_raza, :id_referencia);";
		
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
		$resultado->bindParam(":id_referencia", $id_referencia);
	
		if ($resultado->execute()) {
			self::desconectar();
			return true;
		} else {
			self::desconectar();
			return "No se pudo dar de alta al perro";
		} 
		
	}
}