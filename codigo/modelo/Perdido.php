<?php

class Perdido {
	protected $id_usuario;
	protected $titulo;
	protected $descripcion;
	protected $foto;
	protected $latitud;
	protected $longitud;

	public function __construct($id_usuario, $titulo, $descripcion, $foto, $latitud, $longitud) {
		$this->id_usuario = $id_usuario;
		$this->titulo = $titulo;
		$this->descripcion = $descripcion;
		$this->foto = $foto;
		$this->latitud = $latitud;
		$this->longitud = $longitud;
	}

	//SETERs
	public function setIdUsuario($id_usuario){
		$this->id_usuario = $id_usuario;
	}

	public function setTitulo($titulo){
		$this->titulo = $titulo;
	}

	public function setDescripcion($descripcion){
		$this->descripcion = $descripcion;
	}

	public function setFoto($foto){
		$this->foto = $foto;
	}

	public function setLatitud($latitud){
		$this->latitud = $latitud;
	}

	public function setLongitud($longitud){
		$this->longitud = $longitud;
	}

	//GETTERs

	public function getIdUsuario(){
		return $this->id_usuario;
	}

	public function getTitulo(){
		return $this->titulo;
	}

	public function getDescripcion(){
		return $this->descripcion;
	}

	public function getFoto(){
		return $this->foto;
	}

	public function getLatitud(){
		return $this->latitud;
	}

	public function getLongitud(){
		return $this->longitud;
	}

}