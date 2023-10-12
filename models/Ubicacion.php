<?php
class Ubicacion{

    private $idUbicacion;
    private $pais;
    private $departamento;
    private $ciudad;
    private $barrio;
    private $direccion;
    private $latitud;
    private $longitud;

    public function __construct($pais, $departamento, $ciudad, $barrio, $direccion, $latitud, $longitud)
    {
        $this->pais = empty($pais) ? null : $pais;
        $this->departamento = empty($departamento) ? null : $departamento;
        $this->ciudad = empty($ciudad) ? null : $ciudad;
        $this->barrio = empty($barrio) ? null : $barrio;
        $this->direccion = empty($direccion) ? null : $direccion;
        $this->latitud = empty($latitud) ? null : $latitud;
        $this->longitud = empty($longitud) ? null : $longitud;
    }

    public function getLatitud(){
        return $this->latitud;
    }
    public function getLongitud(){
        return $this->longitud;
    }
    public function getPais(){
        return $this->pais;
    }

    public function getDepto(){
        return $this->departamento;
    }

    public function getCiudad(){
        return $this->ciudad;
    }

    public function getBarrio(){
        return $this->barrio;
    }

    public function getDireccion(){
        return $this->direccion;
    }

    public function getIdUbicacion(){
        return $this->idUbicacion;
    }
}
?>