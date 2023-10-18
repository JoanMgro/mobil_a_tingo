<?php

$pais = isset($_GET['pais']) ? $_GET['pais'] : null;
$depto = isset($_GET['departamento']) ? $_GET['departamento'] : null;
$ciudad = isset($_GET['ciudad']) ? $_GET['ciudad'] : null;
$barrio = isset($_GET['barrio']) ? $_GET['barrio'] : null;
$lat = isset($_GET['lat']) ? $_GET['lat'] : null;
$long = isset($_GET['long']) ? $_GET['long'] : null;

if(isset($pais) && !empty($pais))
{
    require_once __DIR__ . '/' . '../models/classes/Conexion.php';
    require_once __DIR__ . '/' . '../models/classes/Empresa.php';   
    require_once __DIR__ . '/' . './classes/EmpresaController.php';
    require_once __DIR__ . '/' . '../views/classes/EmpresaView.php';

   

    $model = new Empresa();
    $controller = new EmpresaController($model, new Ubicacion());
    $controller->setUbicacion($pais, $depto, $ciudad, $barrio);
    $controller->setEmpresas(new Conexion());
    $view = new EmpresaView($model);
    $view->render();
}



?>