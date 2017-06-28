<?php
/** 
 * Las funciones de este archivo son utilidades generales de todo el sistema
 *
 * ---------------------------------------------------------------------------------------------
 */

include_once 'PasswordHash.php';

/**
 * Encripta contrasenas-> es hashear
 */
function encriptarContrasena($contrasena) {
	#The first argument specifies the "base-2 logarithm of the iteration count used for password stretching" and the second argument specifies the use of portable hashes
    $t_hasher = new PasswordHash(8, FALSE);
    return $t_hasher->HashPassword($contrasena);
}

/**
 * 	Funcion que verifica si una clave para login es correcta.
 *  $contrasena  Es el pass que viene del form de Login
 *  $$contrasenaBD  Es el pass hasheado almacenado en la bd
 */
function comprobarContrasena($contrasena, $contrasenaBD) {
    $t_hasher = new PasswordHash(8, FALSE);
    return $t_hasher->CheckPassword($contrasena, $contrasenaBD);
}
/**
 * Funcion para concatenar el nombre de la foto que se encuentra en la bd
 * a un path
 * @param  $nombre  nombre de la foto en la bd
 * @param  $seccion seccion es para que quede la carpeta (perdidos, perro)
 * @return $el path completo (carpeta + nombre imagen)
 */
function concatenarPath($nombre, $seccion) {
	$path = "img_" . $seccion . "/" . $nombre;
	return $path;
}