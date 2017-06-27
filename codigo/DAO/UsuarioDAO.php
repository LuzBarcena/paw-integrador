<?php

include_once 'Conexion.php';
include_once '../modelo/Usuario.php';
include_once '../controlador/SesionControlador.php';

class UsuarioDAO {

	protected static $conexion;

	private static function getConexion() {
		self::$conexion = Conexion::conectar();
	}

	private static function desconectar() {
		self::$conexion = null;
	}

	public static function login($usuario) {
		$query = "SELECT * FROM USUARIO WHERE nombre_usuario = :usuario";
		self::getConexion();

		$resultado = self::$conexion->prepare($query);

		$usu = $usuario->getNombreUsuario();
		$psw = $usuario->getContrasenia();

		$resultado->bindParam(":usuario", $usu);

		$resultado->execute();

		if ($resultado->rowCount() > 0) {
			$filas = $resultado->fetch();
			$iguales = comprobarContrasena($psw, $filas["contrasenia"]);
			if ($filas["nombre_usuario"]==$usuario->getNombreUsuario() && $iguales) {
				SesionControlador::setId($filas["id_usuario"]);
				self::desconectar();
				return true;
			}
			self::desconectar();
			return "La contraseña introducida no es válida, ingrésela nuevamente.";
		}
		self::desconectar();
		return "El usuario no existe, ingréselo nuevamente.";
		//return false;
	}

	public static function nuevoUsuario($usuario) {
		$query = "INSERT INTO usuario(nombre, apellido, fecha_de_nacimiento, nombre_usuario, email, contrasenia, perfil) VALUES (:nombre, :apellido, :fechaNacimiento, :nombreUsuario, :email, :contrasenia, :perfil);";

		self::getConexion();

		$resultado = self::$conexion->prepare($query);

		$nombre = $usuario->getNombre();
		$apellido = $usuario->getApellido();
		$fechaNacimiento = $usuario->getFechaNacimiento();
		$nombreUsuario = $usuario->getNombreUsuario();
		$email = $usuario->getEmail();
		$contrasenia = $usuario->getContrasenia();
		$perfil = $usuario->getPerfil();

		$resultado->bindParam(":nombre", $nombre);
		$resultado->bindParam(":apellido", $apellido);
		$resultado->bindParam(":fechaNacimiento", $fechaNacimiento);
		$resultado->bindParam(":nombreUsuario", $nombreUsuario);
		$resultado->bindParam(":email", $email);
		$resultado->bindParam(":contrasenia", $contrasenia);
		$resultado->bindParam(":perfil", $perfil);

		if ($resultado->execute()) {
			//self::desconectar();
			return true;
		} else {
			$error = $resultado->errorInfo();
			self::desconectar();
			//el formato es por ejemplo:
			//Array ( [0] => 23505 [1] => 7 [2] => ERROR: llave duplicada viola restricción de unicidad «unique_mail» DETAIL: Ya existe la llave (email)=(luz@gmail.com). )
			if ( strpos($error[2], "unique_nombre_usuario")) {
				return "El nombre de usuario ya está siendo utilizado, elija otro.";
			} else {
				if ( strpos($error[2], "unique_mail")) {
					return "El mail ya está siendo utilizado, elija otro.";
				}					
			}
	        return $error[2];
		}
	}

}