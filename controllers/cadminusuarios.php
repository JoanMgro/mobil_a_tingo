<?php

require_once __DIR__ . '/' . '../models/classes/Conexion.php';
require_once __DIR__ . '/' . '../models/classes/Cuenta.php';

function listarUsuarios(Conexion $conn, $limite, $filtro)
{
    return Cuenta::listarCuentas($conn, $limite, $filtro);

}




// if(isset($_GET['pagmos']) && isset($_GET['pagid']))
// {
//     updatePaginas(new Conexion, new Pagina, $_GET['pagid'], $_GET['pagmos']);
// }

$filtro = isset($_GET['filtro']) ? (empty($_GET['filtro']) ? null : $_GET['filtro']) : null; 
$limite = isset($_GET['limite']) ? (empty($_GET['limite']) ? null : $_GET['limite']) : null; 
   

$listado = listarUsuarios(new Conexion, $limite, $filtro);
   



?>