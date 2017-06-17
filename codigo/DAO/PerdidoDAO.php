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

	public static function devolverPerdidos() {
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
		echo "<script>alert('No hay perdidos para mostrar o hubo un error en la recuperación');</script>";
		return false;
	}
}