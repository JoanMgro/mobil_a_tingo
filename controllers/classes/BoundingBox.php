<?php
class BoundingBox{

    private const RAD_TIERRA = 6378;
    private Array $latitudRange;
    private Array $longitudRange;
    private $lat;
    private $long;
    
      

    public function __construct(Ubicacion $ubicacion)
    {
        $this->latitudRange = [];
        $this->longitudRange = [];
        $this->lat = $ubicacion->getLatitud();
        $this->long = $ubicacion->getLongitud();
        
    }

    public function setLatitudRange($distanceKm=0.2)
    {   //Convierto la distancia a grados decimales, obtengo el Delta (cambio)
        $deltaLat =($distanceKm/self::RAD_TIERRA) * (180/M_PI);
        //Inserto en el arreglo los limites superior (mas pos) e inferior (mas neg)
        array_push($this->latitudRange, $this->lat - $deltaLat);
        array_push($this->latitudRange, $this->lat + $deltaLat);
        // echo $distanceKm;
        // var_dump($this->latitudRange);
    }

    public function getlatitudRange(){
        return $this->latitudRange;
    }

    public function setLongitudRange($distanceKm=0.2)
    {   //Convierto la distancia a grados decimales, obtengo el Delta (cambio)
    $deltaLong =(($distanceKm/self::RAD_TIERRA) * (180/M_PI))/ cos($this->lat * M_PI/180);
        //Inserto en el arreglo los limites izquierdo (mas neg) y derech (mas pos)
        array_push($this->longitudRange, $this->long - $deltaLong); 
        array_push($this->longitudRange, $this->long + $deltaLong);
        // var_dump($this->longitudRange);
    }

    public function getlongitudRange(){
        return $this->longitudRange;
    }





}
?>

