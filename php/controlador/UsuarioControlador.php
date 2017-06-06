<?php

include_once '../DAO/UsuarioDAO.php';
include_once '../modelo/Usuario.php';

class UsuarioControlador {

	public static function login ($usuario, $contrasena) {
        $obj_usuario = new Usuario($usuario,null,$contrasena,null,null,null);

        return UsuarioDAO::login($obj_usuario);
    }

    public static function registroUsuario($nombreUsuario, $email, $contrasenia, $nombre, $apellido, $fechaNacimiento) {
    	$usuario = new Usuario($nombreUsuario, $email, $contrasenia, $nombre, $apellido, $fechaNacimiento);
    	$usuario->setPerfil("visitante"); // porque todo usuario que se registre por este metodo es un visitante
    	
    	return UsuarioDAO::nuevoUsuario($usuario);
    }
}
