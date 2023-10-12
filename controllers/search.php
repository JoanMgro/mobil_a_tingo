<?php
/*
1- Tomar los datos del get/post, cargar el modelo de empresa, listar
2- Llamar a la vista y que haga lo suyo.
*/
// require_once __DIR__ . '/' . '../models/Conexion.php';
require_once __DIR__ . '/' . '../models/Empresa.php';
$conn = new Conexion();

//Instancio el modelo y le inyecto la connexion creada.

$model = new Empresa($conn);

// require_once __DIR__ . '/' . '../models/Ubicacion.php';
$ubicacion = new Ubicacion('Colombia', 'Antioquia', null, null, null, null, null);
    
$model->setEmpresas($ubicacion->getPais(), $ubicacion->getDepto(), $ubicacion->getCiudad(), $ubicacion->getBarrio());

// $model->setEmpresas($pais='Colombia', $depto='Antioquia');

var_dump($model->getEmpresas());



// require __DIR__ . '/' . '../html/index.php';

?>