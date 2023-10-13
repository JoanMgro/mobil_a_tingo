<?php
require_once __DIR__ . '/' . '../models/Conexion.php';
require_once __DIR__ . '/' . '../models/Acerca.php';
require_once __DIR__ . '/' . '../controllers/acercacontroller.php';
require_once __DIR__ . '/' . '../views/acercaview.php';

$model = new Acerca();
$conn = new Conexion();

loadModel($conn, $model);

renderView($model);


?>