<?php

require_once __DIR__ . '/' . '../models/classes/Conexion.php';
require_once __DIR__ . '/' . '../models/classes/Perfil.php';

function listarPerfiles(Conexion $conn, $limite, $filtro)
{
    return Perfil::listar($conn, $limite, $filtro);

}




// if(isset($_GET['pagmos']) && isset($_GET['pagid']))
// {
//     updatePaginas(new Conexion, new Pagina, $_GET['pagid'], $_GET['pagmos']);
// }

$filtro = isset($_GET['filtro']) ? (empty($_GET['filtro']) ? null : $_GET['filtro']) : null; 
$limite = isset($_GET['limite']) ? (empty($_GET['limite']) ? null : $_GET['limite']) : null; 
   

$listado = listarPerfiles(new Conexion, $limite, $filtro);
   



?>