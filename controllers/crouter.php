<?php
require_once __DIR__ . '/' . '../models/classes/Conexion.php';
require_once __DIR__ . '/' . '../models/classes/Pagina.php';

function showPage(Conexion $conn, Pagina $pag)
{
    
    return $pag->mostrarPag($conn);

}

if(!isset($_GET['pg']))
{
    
    echo "<script type='text/javascript'>window.location='../index.php?pg=1000'</script>";
}


$pg = isset($_GET['pg']) ? $_GET['pg'] : 1000;

$pag = new Pagina($pg); 

$showReg = showPage(new Conexion, $pag);





?>