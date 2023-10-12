<?php
require_once __DIR__ . '/' . '../models/Conexion.php';
require_once __DIR__ . '/' . '../models/PlanesMobilatingo.php';
require_once __DIR__ . '/' . '../controllers/PlanesController.php';
require_once __DIR__ . '/' . '../views/PlanesView.php';

$conn = new Conexion();
$model = new PlanesMobilatingo($conn);
$controller = new PlanesController($model);

$controller->setPlanes();
$view = new PlanesView($model);
$view->render();
?>