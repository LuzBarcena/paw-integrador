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


	public static function guardarPerdido($perdido) {
		$id = $perdido->getIdUsuario();
		$titulo = $perdido->getTitulo();
		$descripcion = $perdido->getDescripcion();
		$foto = $perdido->getFoto();
		$latitud = $perdido->getLatitud();
		$longitud = $perdido->getLongitud();
		$nombre = ($perdido->getNombre() == 'null' ? NULL : $perdido->getNombre());
		$sexo = ($perdido->getSexo() == 'null' ? NULL : $perdido->getSexo());
		$fechaAlta = $perdido->getFechaAlta();
        $fechaAlta = "'" . $fechaAlta . "'";
        if ($perdido->getFechaDesaparicion() == 'null') {
        	$fechaDesaparicion = NULL;	
        } else {
        	$fechaDesaparicion = "'" . $perdido->getFechaDesaparicion() . "'";	
        }		
		$estado = "perdido";

		$query = "INSERT INTO perdido(id_usuario, fecha_desaparicion, fecha_alta, titulo, descripcion, foto, estado, sexo, nombre, lat, lng) VALUES (:id_usuario, :fecha_desaparicion, :fecha_alta, :titulo, :descripcion, :foto, :estado, :sexo, :nombre, :latitud, :longitud);";
		
		self::getConexion();

		$resultado = self::$conexion->prepare($query);

		$resultado->bindParam(":id_usuario", $id);
		$resultado->bindParam(":titulo", $titulo);
		$resultado->bindParam(":descripcion", $descripcion);
		$resultado->bindParam(":foto", $foto);
		$resultado->bindParam(":latitud", $latitud);
		$resultado->bindParam(":longitud", $longitud);
		$resultado->bindParam(":estado", $estado);
		$resultado->bindParam(":nombre", $nombre);
		$resultado->bindParam(":sexo", $sexo);
		$resultado->bindParam(":fecha_alta", $fechaAlta);
		$resultado->bindParam(":fecha_desaparicion", $fechaDesaparicion);

		/**
		 * HAY QUE VERIFICAR QUE PASA SI JUSTO CREO UN NUMERO ALEATORIO QUE YA ESTABA.
		 */
		if ($resultado->execute()) {
			self::desconectar();
			return true;
		} else {
			self::desconectar();
			return "No se pudo dar de alta al perdido";
		} 
		
	}
	
	public static function mismoUsuario($idUsuario,$idPerro){
		$query = "SELECT * FROM PERDIDO WHERE id_usuario = :idUsuario AND id_perdido = :idPerdido;";
		self::getConexion();

		$resultado = self::$conexion->prepare($query);

		$resultado->bindParam(":idUsuario", $idUsuario);
		$resultado->bindParam(":idPerdido", $idPerro);
		
		$resultado->execute();

		if ($resultado->rowCount() > 0) {
			$fila = $resultado->fetch();
			self::desconectar();
			return $fila;
		}
		self::desconectar();
		return false;
	}

	public static function marcarEncontrado($id){
		$estado = 'encontrado';

		$query = "UPDATE PERDIDO SET estado = 'encontrado' WHERE id_perdido = :id;";
		self::getConexion();

		$resultado = self::$conexion->prepare($query);

		$resultado->bindParam(":id", $id);
		//$resultado->bindParam(":estado", $estado);
		

		$resultado->execute();

		if ($resultado->rowCount() > 0) {
			self::desconectar();
			return true;
		}
		self::desconectar();
		return false;
	}

}