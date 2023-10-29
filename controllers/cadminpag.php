<?php
require_once __DIR__ . '/' . '../models/classes/Conexion.php';
require_once __DIR__ . '/' . '../models/classes/Pagina.php';


function listarPaginas(Conexion $conn, Pagina $model, $limite, $filtro)
{   
    
    return $model->listarPaginas($conn, $limite, $filtro);

}

function updatePaginas(Conexion $conn, Pagina $model, $idPagina, $pagMos)
{
    $model->updatePaginas($conn, $idPagina, $pagMos);
}




if($_GET['pg'] == 104)
{
    
    if(isset($_GET['pagmos']) && isset($_GET['pagid']))
    {
        updatePaginas(new Conexion, new Pagina, $_GET['pagid'], $_GET['pagmos']);
    }
    
   $filtro = isset($_GET['filtro']) ? (empty($_GET['filtro']) ? null : $_GET['filtro']) : null; 
   $limite = isset($_GET['limite']) ? (empty($_GET['limite']) ? null : $_GET['limite']) : null; 
   

   $listadoPaginas = listarPaginas(new Conexion, new Pagina, $limite, $filtro);
   
    
}


?>