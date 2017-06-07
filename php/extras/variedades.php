<?php
/** 
 * Las funciones de este archivo son utilidades generales de todo el sistema
 *
 * ---------------------------------------------------------------------------------------------
 */

include_once 'PasswordHash.php';

/**
 * Encripta contrasenas
 */
function encriptarContrasena($contrasena) {
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