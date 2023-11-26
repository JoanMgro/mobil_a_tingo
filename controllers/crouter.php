<?php
require_once __DIR__ . '/' . '../models/classes/Conexion.php';
require_once __DIR__ . '/' . '../models/classes/Pagina.php';

function showPage(Conexion $conn, Pagina $pag)
{
    
    return $pag->mostrarPag($conn);

}

$pg = isset($_GET['pg']) ? $_GET['pg'] : 1000;

$pag = new Pagina($pg); 

$showReg = showPage(new Conexion, $pag);





?>