<?php
require_once __DIR__ . '/' . '../models/Conexion.php';
require_once __DIR__ . '/' . '../models/Faq.php';
require_once __DIR__ . '/' . '../controllers/FaqController.php';
require_once __DIR__ . '/' . '../views/FaqView.php';

/*
    1.Instancio el modelo
    2.Inyecto el modelo en controlador
    3.Preparo los datos en el modelo
    4.Paso el modelo a la vista ya cargado
    5.ejecuto la vista
*/
$model = new Faq();
$controller = new FaqController($model);
$controller->setFaqs(new Conexion());
$view = new FaqView($model);
$view->render();
?>