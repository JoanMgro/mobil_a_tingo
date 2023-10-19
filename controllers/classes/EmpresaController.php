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
    public function setUbicacion($pais, $departamento, $ciudad, $barrio, $latitud, $longitud)
    {

        $this->ubicacion->setPais(empty($pais) ? null : $pais);
        $this->ubicacion->setDepto(empty($departamento) ? null : $departamento);
        $this->ubicacion->setCiudad(empty($ciudad) ? null : $ciudad);
        $this->ubicacion->setBarrio(empty($barrio) ? null : $barrio);
        $this->ubicacion->setLatitud(empty($latitud) ? null : $latitud);
        $this->ubicacion->setLongitud(empty($longitud) ? null : $longitud);

    }

    public function setEmpresas(Conexion $conn)
    {
       
        $this->model->setEmpresas($conn, $this->ubicacion);                                          
    }

    public function setEmpresasGps(Conexion $conn, BoundingBox $box)
    {
        
        $this->model->setEmpresasGps($conn, $box);                                          
    }


}

?>

