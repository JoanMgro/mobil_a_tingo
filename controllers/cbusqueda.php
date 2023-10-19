<?php

$pais = isset($_GET['pais']) ? $_GET['pais'] : null;
$depto = isset($_GET['departamento']) ? $_GET['departamento'] : null;
$ciudad = isset($_GET['ciudad']) ? $_GET['ciudad'] : null;
$barrio = isset($_GET['barrio']) ? $_GET['barrio'] : null;
$lat = isset($_GET['lat']) ? $_GET['lat'] : null;
$long = isset($_GET['long']) ? $_GET['long'] : null;
$radioKm = isset($_GET['radio']) ? $_GET['radio'] : null;

if(isset($pais))
{
    require_once __DIR__ . '/' . '../models/classes/Conexion.php';
    
    require_once __DIR__ . '/' . '../models/classes/Empresa.php';
    require_once __DIR__ . '/' . './classes/BoundingBox.php';   
    require_once __DIR__ . '/' . './classes/EmpresaController.php';
    // require_once __DIR__ . '/' . '../views/classes/EmpresaView.php';

   
    
    $model = new Empresa();
    $ubicacion = new Ubicacion();
    $controller = new EmpresaController($model, $ubicacion);
    $controller->setUbicacion($pais, $depto, $ciudad, $barrio, $lat, $long);

    /* le indico al modelo que busque las empresas con los filtros indicados*/
    if(!((empty($lat) && empty($long)) || empty($radioKm)))
    {
        // echo "emtre aca";
        $radioKm = $radioKm/1000; 
        $boundingBox = new BoundingBox($ubicacion);
        $boundingBox->setLatitudRange($radioKm);
        $boundingBox->setLongitudRange($radioKm);
        $controller->setEmpresasGps(new Conexion(), $boundingBox);
    }
    else
    {
        $controller->setEmpresas(new Conexion());
    }  

    // $controller->setEmpresas(new Conexion());
    
    // $view = new EmpresaView($model);
    // $view->render();
}



?>