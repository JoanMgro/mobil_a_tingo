<?php
require_once __DIR__ . '/' . '../models/classes/Conexion.php';
require_once __DIR__ . '/' . '../models/classes/Cuenta.php';


function listarRegistros(Conexion $conn, Cuenta $model, $limite, $filtro, $offSet)
{   
    
    return $model->listarCuentas($conn, $limite, $filtro, $offSet);

}

function activarRegistro(Conexion $conn, Cuenta $model, $idRegistro, $activarRegistro)
{
    if(isset($idRegistro) && isset($activarRegistro))
    $model->activar($conn, $idRegistro, $activarRegistro);
}



//Creo la instancia
$cuenta = new Cuenta();

if(isset($_POST['controller']))
{
        //llamamos la funcion correspondiente
    if($_POST['controller'] == 'activar')
    {
        activarRegistro(new Conexion, $cuenta, $_POST['id_cuenta'], $_POST['activo']);
        // echo "<script type='text/javascript'>window.location='../home.php?pg=102'</script>";
    }   


}

    
$filtro = isset($_POST['filtro']) ? (empty($_POST['filtro']) ? null : $_POST['filtro']) : null;

$resetPage = !isset($filtro) ? false : (isset($resetPage) ? false : true); 

$limite = isset($_POST['limite']) ? (empty($_POST['limite']) ? 5 : $_POST['limite']) : 5; 



require_once __DIR__ . '/' . './cpaginacion.php';


//obtengo el total de paginas para mostrar los registros

$totalPages = totalPages($cuenta, $limite, $filtro);
//calcular el offset

$offSet = offSet($limite, $page); 
$listadoRegistros = listarRegistros(new Conexion, $cuenta, $limite, $filtro, $offSet);
// var_dump($listadoRegistros);
?>