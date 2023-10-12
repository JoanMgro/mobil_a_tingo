<?php


class EmpresaController{
    
    private $model;
    private $ubicacion;

    
    public function __construct(Empresa $model, Ubicacion $ubicacion)
    {
        $this->model = $model; 
        $this->ubicacion = $ubicacion;       
                 
    }



    /*
        Cargo el modelo con la lista de empresas de acuerdo a la ubicacion 
        seleccionada en el filtro
    */
    public function setUbicacion($pais, $departamento, $ciudad, $barrio)
    {

        $this->ubicacion->setPais(empty($pais) ? null : $pais);
        $this->ubicacion->setDepto(empty($departamento) ? null : $departamento);
        $this->ubicacion->setCiudad(empty($ciudad) ? null : $ciudad);
        $this->ubicacion->setBarrio(empty($barrio) ? null : $barrio);

    }
    public function setEmpresas(Conexion $conn)
    {
        $this->model->setEmpresas($conn, $this->ubicacion);                                          
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
