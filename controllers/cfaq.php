<?php
require_once __DIR__ . '/' . '../models/classes/Conexion.php';
require_once __DIR__ . '/' . '../models/classes/Faq.php';
require_once __DIR__ . '/' . './classes/FaqController.php';
require_once __DIR__ . '/' . '../views/classes/FaqView.php';

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
// $view = new FaqView($model);
// $view->render();
?>