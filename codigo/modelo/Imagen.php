<?php

class Imagen {
    
    private $id;
    private $path;
    private $alto;
    private $ancho;
    private $nombre;
    private $tipo;
    private $tamanio;

    public function __construct($imageParams) {
        $this->setPath($imageParams['path']);
        $this->setNombre($imageParams['name']);
        $this->setTipo($imageParams['type']);
        $this->setTamanio($imageParams['size']);
    }
    
    public function getId() {
        return $this->id;
    }

    public function getPath() {
        return $this->path;
    }
   
    public function getAlto() {
        return $this->alto;
    }

    public function getAncho() {
        return $this->ancho;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function getTipo() {
        return $this->tipo;
    }

    public function getTamanio() {
        return $this->tamanio;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setPath($path) {
        $this->path = $path;
    }

    public function setAlto($alto) {
        $this->alto = $alto;
    }

    public function setAncho($ancho) {
        $this->ancho = $ancho;
    }
    
    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function setTipo($tipo) {
        $this->tipo = $tipo;
    }

    public function setTamanio($tamanio) {
        $this->tamanio = $tamanio;
    }
}
