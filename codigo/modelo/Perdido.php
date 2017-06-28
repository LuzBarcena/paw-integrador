<?php

class Perdido {
	private $id_usuario;
	private $titulo;
	private $descripcion;
	private $foto;
	private $latitud;
	private $longitud;
	private $fechaAlta;
	private $fechaDesaparicion;
	private $sexo;
	private $nombre;
	private $estado;

	public function __construct($id_usuario, $titulo, $descripcion, $foto, $latitud, $longitud) {
		$this->id_usuario = $id_usuario;
		$this->titulo = $titulo;
		$this->descripcion = $descripcion;
		$this->foto = $foto;
		$this->latitud = $latitud;
		$this->longitud = $longitud;
	}

	//SETERs
	public function setIdUsuario($id_usuario) {
		$this->id_usuario = $id_usuario;
	}

	public function setTitulo($titulo) {
		$this->titulo = $titulo;
	}

	public function setDescripcion($descripcion) {
		$this->descripcion = $descripcion;
	}

	public function setFoto($foto) {
		$this->foto = $foto;
	}

	public function setLatitud($latitud) {
		$this->latitud = $latitud;
	}

	public function setLongitud($longitud) {
		$this->longitud = $longitud;
	}

	public function setFechaDesaparicion($fechaDesaparicion) {
		$this->fechaDesaparicion = $fechaDesaparicion;
	}

	public function setFechaAlta($fechaAlta) {
		$this->fechaAlta = $fechaAlta;
	}

	public function setSexo($sexo) {
		$this->sexo = $sexo;
	}

	public function setNombre($nombre) {
		$this->nombre = $nombre;
	}

	public function setEstado($estado) {
		$this->estado = $estado;
	}

	//GETTERs

	public function getIdUsuario() {
		return $this->id_usuario;
	}

	public function getTitulo() {
		return $this->titulo;
	}

	public function getDescripcion() {
		return $this->descripcion;
	}

	public function getFoto() {
		return $this->foto;
	}

	public function getLatitud() {
		return $this->latitud;
	}

	public function getLongitud() {
		return $this->longitud;
	}

	public function getFechaAlta() {
		return $this->fechaAlta;
	}

	public function getFechaDesaparicion() {
		return $this->fechaDesaparicion;
	}

	public function getSexo() {
		return $this->sexo;
	}

	public function getNombre() {
		return $this->nombre;
	}

	public function getEstado() {
		return $this->estado;
	}

}