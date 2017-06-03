
<?php

class UsuarioControlador(){

	public static function login ($usuario, $contrasena) {
        $obj_usuario = new Usuario();
        $obj_usuario->setUsuario($usuario);
        $obj_usuario->setContrasena($contrasena);

        return UsuarioDAO::login($obj_usuario);
    }

}
