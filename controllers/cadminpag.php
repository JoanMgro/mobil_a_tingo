<?php
require_once __DIR__ . '/' . '../models/classes/Conexion.php';
require_once __DIR__ . '/' . '../models/classes/Pagina.php';
require_once __DIR__ . '/' . './cpaginacion.php';


function listarPaginas(Conexion $conn, Pagina $model, $limite, $filtro, $offSet)
{   
    
    return $model->listarPaginas($conn, $limite, $filtro, $offSet);

}

function updatePaginas(Conexion $conn, Pagina $model, $idPagina, $pagMos)
{
    $model->updatePaginas($conn, $idPagina, $pagMos);
}

//Creo la instancia
$pagina = new Pagina();

// if($_GET['pg'] == 104)
   
if(isset($_GET['pagmos']) && isset($_GET['pagid']))
{
    updatePaginas(new Conexion, new Pagina, $_GET['pagid'], $_GET['pagmos']);
}
    
$filtro = isset($_GET['filtro']) ? (empty($_GET['filtro']) ? null : $_GET['filtro']) : null; 

$limite = isset($_GET['limite']) ? (empty($_GET['limite']) ? $pagina->getNumberOfRegisters(new Conexion, $filtro) : $_GET['limite']) : $pagina->getNumberOfRegisters(new Conexion, $filtro); 



//obtebgo el total de paginas para mostrar los registros

$totalPages = totalPages($pagina, $limite, $filtro);
//calcular el offset
$offSet = offSet($limite, $page); 
$listadoPaginas = listarPaginas(new Conexion, $pagina, $limite, $filtro, $offSet);

   
    



?>