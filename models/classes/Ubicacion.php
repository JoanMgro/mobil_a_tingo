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

    // public function __construct($id = NULL, $pais = NULL, $departamento = NULL,
    //                             $ciudad = NULL, $barrio= NULL, $direccion = NULL,
    //                             $latitud = NULL, $longitud = NULL)
    // {
    //     $this->idUbicacion = $id;
    //     $this->pais = $pais;
    //     $this->departamento = $departamento;
    //     $this->ciudad = $ciudad;
    //     $this->barrio = $barrio;
    //     $this->direccion =  $direccion;
    //     $this->latitud = $latitud;
    //     $this->longitud = $longitud;
    // }

    public function getLatitud(){
        return $this->latitud;
    }

    public function setLatitud($lat){
        $this->latitud = $lat;
    }
    public function getLongitud(){
        return $this->longitud;
    }
    public function setLongitud($long){
        $this->longitud = $long;
    }
    public function getPais(){
        return $this->pais;
    }
    public function setPais($pais){
        $this->pais = $pais;
    }

    public function getDepto(){
        return $this->departamento;
    }
    public function setDepto($departamento){
        $this->departamento = $departamento;
    }

    public function getCiudad(){
        return $this->ciudad;
    }
    public function setCiudad($ciudad){
        $this->ciudad = $ciudad;
    }

    public function getBarrio(){
        return $this->barrio;
    }
    public function setBarrio($barrio){
        $this->barrio = $barrio;
    }

    public function getDireccion(){
        return $this->direccion;
    }

    public function getIdUbicacion(){
        return $this->idUbicacion;
    }
}
?>