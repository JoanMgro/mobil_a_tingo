<?php
require_once __DIR__ . '/' . '../models/classes/Conexion.php';
require_once __DIR__ . '/' . '../models/classes/Cuenta.php';
require_once __DIR__ . '/' . './cpaginacion.php';


function listarRegistros(Conexion $conn, Cuenta $model, $limite, $filtro, $offSet)
{   
    
    return $model->listarCuentas($conn, $limite, $filtro, $offSet);

}

function activarRegistro(Conexion $conn, Cuenta $model, $idRegistro, $activarRegistro)
{
    if(isset($idRegistro) && isset($activarRegistro))
    $model->activar($conn, $idRegistro, $activarRegistro);
}

// function actualizarRegistro(Conexion $conn, Cuenta $modelo, $newId, $oldId, $nombre, $archivo, $orden, $menu)
// {
//     $modelo->actualizar($conn, $newId, $oldId, $nombre, $archivo, $orden, $menu);
// }
// function eliminarRegistro(Conexion $conn, Cuenta $modelo, $id)
// {
//     $modelo->eliminar($conn, $id);
// }
// function crearRegistro(Conexion $conn, Cuenta $modelo, $id, $nombre, $archivo, $mostrar, $orden, $menu)
// {
//     $modelo->crear($conn, $id, $nombre, $archivo, $mostrar, $orden, $menu);
    
// }



//Creo la instancia
$cuenta = new Cuenta();

//llamamos la funcion correspondiente
if($_POST['controller'] == 'activar')
{
    activarRegistro(new Conexion, $cuenta, $_POST['id_cuenta'], $_POST['activo']);
}   
// if($_POST['controller'] == 'actualizar')
// {
//     actualizarRegistro(new Conexion, new Pagina, $_POST['pagid'], $_POST['oldid'], $_POST['pagnom'], $_POST['pagarc'], $_POST['pagord'], $_POST['pagmen']);
// }

// if($_POST['controller'] == 'eliminar')
// {
//     if(isset($_POST['pagid']))
//     {
        
//         eliminarRegistro(new Conexion, $cuenta, $_POST['pagid']);
//     }
    
// }
// if($_POST['controller'] == 'crear')
// {
//     if(isset($_POST['id'], $_POST['nombre'], $_POST['archivo'], $_POST['orden'], $_POST['menu']))
//     {
    
        
//             $mostrar = isset($_POST['activo']) ? isset($_POST['activo']) : 0;
//             crearRegistro(new Conexion, $cuenta, $_POST['id'], $_POST['nombre'], $_POST['archivo'], $mostrar,$_POST['orden'], $_POST['menu']);
              

//     }
    
// }



    
$filtro = isset($_POST['filtro']) ? (empty($_POST['filtro']) ? null : $_POST['filtro']) : null; 

$limite = isset($_POST['limite']) ? (empty($_POST['limite']) ? 5 : $_POST['limite']) : 5; 



//obtengo el total de paginas para mostrar los registros

$totalPages = totalPages($cuenta, $limite, $filtro);
//calcular el offset
$offSet = offSet($limite, $page); 
$listadoRegistros = listarRegistros(new Conexion, $cuenta, $limite, $filtro, $offSet);
// var_dump($listadoRegistros);
?>