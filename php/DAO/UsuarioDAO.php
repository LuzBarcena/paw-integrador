<?php

include_once 'Conexion.php';
include '../modelo/Usuario.php';

class UsuarioDAO {

	protected static $conexion;

	private static function getConexion() {
		self::$conexion = Conexion::conectar();
	}

	private static function desconectar() {
		self::$conexion = null;
	}

	public static function login($usuario) {
		$query = "SELECT * FROM USUARIO WHERE nombre_usuario = :usuario AND contrasenia = :contrasena";

		self::getConexion();

		$resultado = self::$conexion->prepare($query);

		$usu = $usuario->getUsuario();
		$psw = $usuario->getContrasena();

		$resultado->bindParam(":usuario", $usu);
		$resultado->bindParam(":contrasena", $psw);

		$resultado->execute();

		if ($resultado->rowCount() > 0) {
			$filas = $resultado->fetch();
			if ($filas["nombre_usuario"]==$usuario->getUsuario() && $filas["contrasenia"]==$usuario->getContrasena()) {
				return true;
			}
		}

		return false;
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
			self::desconectar();
            return true;
        }
        self::desconectar();
        return false;
	}

}
