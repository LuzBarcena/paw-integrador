<?php

class Usuario {
	protected $nombre;
	protected $apellido;
	protected $fecha_nacimiento;
	protected $nombre_usuario;
	protected $email;
	protected $contrasenia;
	protected $perfil;

	public function __construct($nombreUsuario, $email, $contrasenia, $nombre, $apellido) {
		$this->nombre = $nombre;
		$this->apellido = $apellido;
		$this->nombre_usuario = $nombreUsuario;
		$this->email = $email;
		$this->contrasenia = $contrasenia;
	}

//SETERs
	public function setNombre($nombre){
		$this->nombre = $nombre;
	}

	public function setApellido($apellido){
		$this->apellido = $apellido;
	}

	public function setNombreUsuario($nombre_usuario){
		$this->nombre_usuario = $nombre_usuario;
	}

	public function setEmail($email){
		$this->email = $email;
	}

	public function setContrasenia($contrasenia){
		$this->contrasenia = $contrasenia;
	}

	public function setPerfil($perfil){
		$this->perfil = $perfil;
	}


//GETTERs

	public function getNombre(){
		return $this->nombre;
	}

	public function getApellido(){
		return $this->apellido;
	}

	public function getNombreUsuario(){
		return $this->nombre_usuario;
	}

	public function getEmail(){
		return $this->email;
	}

	public function getContrasenia(){
		return $this->contrasenia;
	}

	public function getPerfil(){
		return $this->perfil;
	}

}
