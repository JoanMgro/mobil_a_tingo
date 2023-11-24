<?php
require_once __DIR__ . '/' . '../models/classes/Conexion.php';
require_once __DIR__ . '/' . '../models/classes/Pagina.php';

function showPage(Conexion $conn, Pagina $pag)
{
    
    return $pag->mostrarPag($conn);

}


$pag = new Pagina(isset($_GET['pagid']) ? $_GET['pagid'] : 1000); 

$showReg = showPage(new Conexion, $pag);




?>