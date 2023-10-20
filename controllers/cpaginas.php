<?php
require_once __DIR__ . '/' . '../models/classes/Conexion.php';
require_once __DIR__ . '/' . '../models/classes/Pagina.php';


function loadPaginas(Conexion $conn, Pagina $model, $pagina)
{   
    
    $model->setPaginas($conn, $pagina);

}

$mpagina = new Pagina(); 
$pattern = "/[\/\.\?]/";
$data = $_SERVER['REQUEST_URI'];
$pagina = preg_split($pattern, $data);

loadPaginas(new Conexion(), $mpagina, $pagina[1]);

?>