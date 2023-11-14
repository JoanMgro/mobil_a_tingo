<?php
require_once __DIR__ . '/' . '../models/classes/Conexion.php';
require_once __DIR__ . '/' . '../models/classes/Perfil.php';


function listarPaginasPorPerfil(Conexion $conn, Perfil $perfil, $pefid, $pagmen)
{
    return $perfil->listarPagPer($conn, $pefid, $pagmen);
}

$pagper = new Perfil();

if($_POST['controller'] == 'mostrar')
{
    
    $listadoPagPer= listarPaginasPorPerfil(new Conexion, $pagper, $_POST['pefid'], $_POST['pagmen']);
}



?>