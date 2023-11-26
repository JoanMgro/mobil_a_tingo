<?php
require_once __DIR__ . '/' . '../models/classes/Conexion.php';

require_once __DIR__ . '/' . '../models/classes/Empresa.php';




function listarEmpresa(Conexion $conn, Empresa $model)
{
    return $model->listarDetalleRes($conn);
}


$idEmpresa = isset($_GET['id']) ? $_GET['id'] : null;

if($idEmpresa)
{
    $registro = listarEmpresa(new Conexion, new Empresa($idEmpresa));
}

?>