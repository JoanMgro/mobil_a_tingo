<?php

class PlanesController{

    private $modelo;
    

    public function __construct(PlanesMobilatingo $modelo)
    {
        $this->modelo = $modelo;
    }

    public function setPlanes()
    {        
        $this->modelo->setPlanes();
    }

}
?>