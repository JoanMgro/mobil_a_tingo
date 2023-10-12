<?php
require_once __DIR__ . '/' . '../models/Conexion.php';
require_once __DIR__ . '/' . '../models/PlanesMobilatingo.php';
require_once __DIR__ . '/' . '../controllers/PlanesController.php';
require_once __DIR__ . '/' . '../views/PlanesView.php';

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