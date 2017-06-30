<?php

class Perro {
	private $foto;
	private $nombre;
	private $edad;
	private $sexo;
	private $particularidad;
	private $tamaño;
	private $peso;
	private $id_referencia;
	private $id_raza;

	public function __construct($foto, $nombre, $edad,$sexo, $particularidad, $tamaño, $peso) {
		$this->foto = $foto;
		$this->nombre = $nombre;
		$this->edad = $edad;
		$this->sexo = $sexo;
		$this->particularidad = $particularidad;
		$this->tamaño = $tamaño;
		$this->peso = $peso;
	}

	//SETERs
	public function setFoto($foto) {
		$this->foto = $foto;
	}

	public function setNombre($nombre) {
		$this->nombre = $nombre;
	}

	public function setEdad($edad) {
		$this->edad = $edad;
	}

	public function setSexo($sexo) {
		$this->edad = $sexo;
	}

	public function setParticularidad($particularidad) {
		$this->particularidad = $particularidad;
	}

	public function setTamaño($tamaño) {
		$this->tamaño = $tamaño;
	}

	public function setPeso($peso) {
		$this->sexo = $sexo;
	}

	public function setIdReferencia($id_referencia) {
		$this->id_referencia = $id_referencia;
	}

	public function setIdRaza($id_raza) {
		$this->id_raza = $id_raza;
	}

	//GETTERs

	public function getFoto() {
		return $this->foto;
	}

	public function getNombre() {
		return $this->nombre;
	}

	public function getEdad() {
		return $this->edad;
	}

	public function getSexo() {
		return $this->sexo;
	}

	public function getParticularidad() {
		return $this->particularidad;
	}

	public function getTamaño() {
		return $this->tamaño;
	}

	public function getPeso() {
		return $this->peso;
	}

	public function getIdReferencia() {
		return $this->id_referencia;
	}

	public function getIdRaza() {
		return $this->id_raza;
	}
}