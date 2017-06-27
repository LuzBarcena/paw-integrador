<?php

include_once 'Conexion.php';
include_once '../modelo/Perdido.php';


class PerdidoDAO {

	protected static $conexion;

	private static function getConexion() {
		self::$conexion = Conexion::conectar();
	}

	private static function desconectar() {
		self::$conexion = null;
	}

	public static function obtenerPerdidos($indice, $elementosPorPagina) {
		$query = "SELECT * FROM PERDIDO ORDER BY ID_PERDIDO DESC LIMIT :cantidad OFFSET :indice;";

		self::getConexion();

		$resultado = self::$conexion->prepare($query);

		$resultado->bindParam(":cantidad", $elementosPorPagina);
		$resultado->bindParam(":indice", $indice);

		$resultado->execute();

		if ($resultado->rowCount() > 0) {
			$filas = $resultado->fetchAll();
			self::desconectar();
			return $filas;
		}
		self::desconectar();
		return false;
	}

	public static function obtenerCantidadPerdidos() {
		$query = "SELECT count(*) as total FROM PERDIDO;";
		self::getConexion();

		$resultado = self::$conexion->prepare($query);

		$resultado->execute();

		if ($resultado->rowCount() > 0) {
			$fila = $resultado->fetch();
			self::desconectar();
			return $fila['total'];
		}
		self::desconectar();
		return false;
	}

	public static function obtenerUnPerdido($id){
		$query = "SELECT * FROM PERDIDO WHERE id_perdido = :id";
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


	public static function guardarPerdido($id, $titulo, $descripcion, $foto, $latitud, $longitud){
		$query = "INSERT INTO perdido(id_usuario, titulo, descripcion, foto, lat, lng) VALUES (:id_usuario, :titulo, :descripcion, :foto, :latitud, :longitud);";
		self::getConexion();

		$resultado = self::$conexion->prepare($query);

		$resultado->bindParam(":id_usuario", $id);
		$resultado->bindParam(":titulo", $titulo);
		$resultado->bindParam(":descripcion", $descripcion);
		$resultado->bindParam(":foto", $foto);
		$resultado->bindParam(":latitud", $latitud);
		$resultado->bindParam(":longitud", $longitud);

		if ($resultado->execute()) {
			self::desconectar();
			return true;
		}else{
			self::desconectar();
			return "No se pudo dar de alta al perdido";
		} 
		
	}

}