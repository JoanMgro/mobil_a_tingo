<?php

class PlanesController{

    private PlanesMobilatingo $modelo;
    

    public function __construct(PlanesMobilatingo $modelo)
    {
        $this->modelo = $modelo;
    }

    public function setPlanes(Conexion $conn)
    {        
        $this->modelo->setPlanes($conn);
    }

}
?>