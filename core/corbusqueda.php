<?php

$pais = isset($_GET['pais']) ? $_GET['pais'] : null;
$depto = isset($_GET['departamento']) ? $_GET['departamento'] : null;
$ciudad = isset($_GET['ciudad']) ? $_GET['ciudad'] : null;
$barrio = isset($_GET['barrio']) ? $_GET['barrio'] : null;
$lat = isset($_GET['lat']) ? $_GET['lat'] : null;
$long = isset($_GET['long']) ? $_GET['long'] : null;

if(isset($pais))
{
    require_once __DIR__ . '/' . '../models/Empresa.php';
    require_once __DIR__ . '/' . '../controllers/EmpresaController.php';


    //Instancio conexion
    $conn = new Conexion();
    //Instancio ubicacion 
    $ubicacion = new Ubicacion($pais, $depto, $ciudad, $barrio, NULL, NULL, NULL);
    
    //Instancio bounding
    // $boundingBox = new BoundingBox($ubicacion);
    //Instancio el modelo y le inyecto la connexion creada.
    $model = new Empresa($conn, $ubicacion);
   
    $controller = new EmpresaController($model);
    $controller->setEmpresas();
    var_dump($model->getEmpresas());

}



?>