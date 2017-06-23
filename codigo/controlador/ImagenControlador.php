<?php

class ImagenControlador {
	/*
	funcion que recibe el directorio del archivo y verifica si el mismo esta presente. Si no lo esta retorna 0, sino 1.
	*/
	public static function archivoExistente($directorioDestino) {
		return file_exists($directorioDestino);
	}
	/*
	funcion que recibe el tamanio del archivo y verifica si el mismo esta permitido. Si lo esta, entonces retorna 0, sino 1.
	*/
	public static function tamanioPermitido($tamanioArchivo) {
		return $tamanioArchivo < 10000000;
	}
	/*
	funcion que recibe el tipo del archivo y verifica si el tipo esta permitido. Si lo esta, entonces retorna 0, sino 1.
	*/
	public static function tipoPermitido($tipoArchivo) {
		return $tipoArchivo == "image/png";
	}
}