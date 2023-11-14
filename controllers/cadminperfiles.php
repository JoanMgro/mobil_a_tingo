<?php
require_once __DIR__ . '/' . '../models/classes/Conexion.php';
require_once __DIR__ . '/' . '../models/classes/Perfil.php';

function borrarPagPer(Conexion $conn, Perfil $perfil, $pefid, $pagid)
{
    $perfil->borrarPagPer($conn, $pefid, $pagid);
}
function agregarPagPer(Conexion $conn, Perfil $perfil, $pefid, $pagid)
{
    $perfil->agregarPagPer($conn, $pefid, $pagid);
}

function listarPerfiles(Conexion $conn, Perfil $perfil)
{
    return $perfil->listar($conn);

}

function listarPaginasPorPerfil(Conexion $conn, Perfil $perfil, $pefid, $pagmen)
{
    return $perfil->listarPagPer($conn, $pefid, $pagmen);
}

$perfil = new Perfil();


$listadoRegistros = listarPerfiles(new Conexion, $perfil);


if($_POST['controller'] == 'mostrar')
{
    
    $listadoPagPer= listarPaginasPorPerfil(new Conexion, $perfil, $_POST['pefid'], $_POST['pagmen']);
}


if($_POST['controller'] == 'borrarpagper')
{
    borrarPagPer(new Conexion, $perfil, $_POST['pefid'], $_POST['pagid']);

}
if($_POST['controller'] == 'agregarpagper')
{
    agregarPagPer(new Conexion, $perfil, $_POST['pefid'], $_POST['pagid']);
}



?>