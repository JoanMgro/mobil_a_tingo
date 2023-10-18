<?php
class BoundingBox{

    private const RAD_TIERRA = 6378;
    private Array $latitudRange;
    private Array $longitudRange;
    private $lat;
    private $long;  

    public function __construct($latitud, $longitud)
    {
        $this->latitudRange = [];
        $this->longitudRange = [];
        $this->lat = $latitud;
        $this->long = $longitud;
    }

    public function setLatitudRange($distanceKm=0.2)
    {   //Convierto la distancia a grados decimales, obtengo el Delta (cambio)
        $deltaLat =($distanceKm/self::RAD_TIERRA) * (180/M_PI);
        //Inserto en el arreglo los limites superior e inferior
        array_push($this->latitudRange, $this->lat + $deltaLat);
        array_push($this->latitudRange, $this->lat - $deltaLat);
    }

    public function getlatitudRange(){
        return $this->latitudRange;
    }



}
?>