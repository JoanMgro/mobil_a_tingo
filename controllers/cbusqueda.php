<?php
require_once __DIR__ . '/' . '../models/classes/Conexion.php';
require_once __DIR__ . '/' . './classes/BoundingBox.php';
require_once __DIR__ . '/' . '../models/classes/Ubicacion.php'; 
require_once __DIR__ . '/' . '../models/classes/Busqueda.php';


$pais = isset($_GET['pais']) ? $_GET['pais'] : null;
$depto = isset($_GET['departamento']) ? $_GET['departamento'] : null;
$ciudad = isset($_GET['ciudad']) ? $_GET['ciudad'] : null;
$barrio = isset($_GET['barrio']) ? $_GET['barrio'] : null;
$direccion = isset($_GET['direccion']) ? $_GET['direccion'] : null;
$lat = isset($_GET['lat']) ? $_GET['lat'] : null;
$long = isset($_GET['long']) ? $_GET['long'] : null;
$radioKm = isset($_GET['radio']) ? $_GET['radio'] : null;


function loadSearchModel(Conexion $conn, Busqueda $searchModel, Ubicacion $ubicacion, $radioKm)
{
    /* le indico al modelo que busque las empresas con los filtros indicados*/
    if(!((empty($ubicacion->getLatitud()) && empty($ubicacion->getLongitud())) || empty($radioKm)))
    {    
        $radioKm = $radioKm/1000; 
        $boundingBox = new BoundingBox($ubicacion);
        $boundingBox->setLatitudRange($radioKm);
        $boundingBox->setLongitudRange($radioKm);
        $searchModel->setEmpresasGps($conn, $boundingBox);
    }
    else
    {
        $searchModel->setEmpresas($conn, $ubicacion);
    } 

}   

if(isset($pais))
{ 
    $searchModel = new Busqueda();
    $ubicacion = new Ubicacion($pais, $depto, $ciudad, $barrio, $direccion, $lat, $long);

    loadSearchModel(new Conexion, $searchModel, $ubicacion, $radioKm);

}




?>