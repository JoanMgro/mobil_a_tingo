<?php
require_once __DIR__ . '/' . '../models/classes/Conexion.php';
require_once __DIR__ . '/' . '../models/classes/Acerca.php';



function loadModel(Conexion $conn, Acerca $model)
{
    $model->readTextoAcerca($conn);

}


$model = new Acerca();
$conn = new Conexion();

loadModel($conn, $model);




?>