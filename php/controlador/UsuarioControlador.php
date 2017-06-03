<?php

class UsuarioControlador(){

	public static function login ($usuario, $contrasena) {
        $obj_usuario = new Usuario();
        $obj_usuario->setUsuario($usuario);
        $obj_usuario->setContrasena($contrasena);

        return UsuarioDAO::login($obj_usuario);
    }

    public static function registro_usuario($nombre, $apellido, $fecha_nacimiento, $nombre_usuario, $email, $contrasenia) {

    }
}
