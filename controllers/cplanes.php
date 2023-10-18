<?php
require_once __DIR__ . '/' . '../models/classes/Conexion.php';
require_once __DIR__ . '/' . '../models/classes/PlanesMobilatingo.php';
require_once __DIR__ . '/' . './classes/PlanesController.php';
require_once __DIR__ . '/' . '../views/classes/PlanesView.php';

/*
    1.Instancio el modelo
    2.Inyecto el modelo en controlador
    3.Preparo los datos en el modelo
    4.Paso el modelo a la vista ya cargado
    5.ejecuto la vista
*/
$model = new PlanesMobilatingo();
$controller = new PlanesController($model);
$controller->setPlanes(new Conexion());
$view = new PlanesView($model);
$view->render();
?>