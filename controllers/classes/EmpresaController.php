<?php


class EmpresaController{
    
    private $model;
    private $ubicacion;
    private $telefono;

    
    public function __construct(Empresa $model, Ubicacion $ubicacion, Telefono $telefono = NULL)
    {
        $this->model = $model; 
        $this->ubicacion = $ubicacion;
        $this->telefono = $telefono;       
                 
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

  

    public function crearEmpresa(Conexion $conn)
    {
        
    }


}

?>

