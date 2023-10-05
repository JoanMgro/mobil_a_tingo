<?php
require_once __DIR__ . '/' . '../models/SearchModel.php';

class SearchController{
    private const RAD_TIERRA = 6378;
    private $searchModel;
    private $myPosition;
    private $latitudRange;
    private $boundingBox;

    public function __construct($model,$pais, $dept,
                                $ciudad, $barrio, $radio, $coords)
    {
        $this->searchModel = $model;
        $this->myPosition = $coords;
        $this->latitudRange = [];        
    }

    public function callModel(){     



    }

    public function set_boundingBox(){
            

    }

    public function set_latitudRange($distanceKm=0.2){
        $deltaLat =($distanceKm/self::RAD_TIERRA) * (180/M_PI);
        array_push($this->latitudRange, $this->myPosition->latitud + $deltaLat);
        array_push($this->latitudRange, $this->myPosition->latitud - $deltaLat);
    }

    public function get_latitudRange(){
        return $this->latitudRange;
    }

}






?>
<!-- 
const RAD_TIERRA = 6378;

const latitudeRange = (latitude, distanceKm) =>{
    let deltaLat = (distanceKm/RAD_TIERRA) * (180/Math.PI);
    return Array(latitude + deltaLat, latitude - deltaLat);
};

const longitudeRange = (longitude, latitude, distanceKm)=>{
  let deltaLong = ((distanceKm/RAD_TIERRA) * (180/Math.PI))/Math.cos(latitude*Math.PI/180);
  return Array(longitude + deltaLong, longitude - deltaLong);

}; -->
