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

	public static function obtenerPerdidos() {
		$query = "SELECT * FROM PERDIDO";
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
}