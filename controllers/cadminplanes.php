<?php
require_once __DIR__ . '/' . '../models/classes/Conexion.php';
require_once __DIR__ . '/' . '../models/classes/PlanesMobilatingo.php';

function listarEshop(Conexion $conn, PlanesMobilatingo $model)
{
    return $model->listarEshop($conn);
}

function listarRegistros(Conexion $conn, PlanesMobilatingo $model, $limite, $filtro, $offSet)
{   
    
        return $model->listar($conn, $limite, $filtro, $offSet);
    
   

}

function activarRegistro(Conexion $conn, PlanesMobilatingo $model, $idRegistro, $activarRegistro)
{
    if(isset($idRegistro) && isset($activarRegistro))
    $model->activar($conn, $idRegistro, $activarRegistro);
}

function actualizarRegistro(Conexion $conn, PlanesMobilatingo $modelo, $id, $nombre, $descripcion, $valor, $vigencia)
{
    $modelo->actualizar($conn, $id, $nombre, $descripcion, $valor, $vigencia);
}
function eliminarRegistro(Conexion $conn, PlanesMobilatingo $modelo, $id)
{
    $modelo->eliminar($conn, $id);
}
function crearRegistro(Conexion $conn, PlanesMobilatingo $modelo, $nombre, $descripcion, $valor, $vigencia, $activo)
{
    $modelo->crear($conn, $nombre, $descripcion, $valor, $vigencia, $activo);
    
}



//Creo la instancia
$plan = new PlanesMobilatingo();

if(isset($_POST['controller']))
{

    //llamamos la funcion correspondiente
    if($_POST['controller'] == 'activar')
    {
        activarRegistro(new Conexion, $plan, $_POST['id_plan'], $_POST['activo']);
    }   
    if($_POST['controller'] == 'actualizar')
    {
        actualizarRegistro(new Conexion, $plan, $_POST['id_plan'], $_POST['nom_plan'], $_POST['desc_plan'], $_POST['valor_plan'], $_POST['dias_vigencia']);
    }

    if($_POST['controller'] == 'eliminar')
    {
        if(isset($_POST['id_plan']))
        {
            
            eliminarRegistro(new Conexion, $plan, $_POST['id_plan']);
        }
        
    }
    if($_POST['controller'] == 'crear')
    {
        if(isset($_POST['nom_plan'], $_POST['desc_plan'], $_POST['valor_plan'], $_POST['dias_vigencia']))
        {
        
            
                $mostrar = isset($_POST['activo']) ? isset($_POST['activo']) : 1;
                crearRegistro(new Conexion, $plan, $_POST['nom_plan'], $_POST['desc_plan'], $_POST['valor_plan'], $_POST['dias_vigencia'], $mostrar);
                

        }
        
    }


}


// crearRegistro(new Conexion, $plan, 'atingo test', 'plan test de mpobilatingo', 2450000, 30, 1);
// actualizarRegistro(new Conexion, $plan, 6, 'plan actualizado', 'dec actualizada', 150000, 15);
// eliminarRegistro(new Conexion, $plan, 6);

if($_SESSION['pefid'] == 1)
{
    $filtro = isset($_POST['filtro']) ? (empty($_POST['filtro']) ? null : $_POST['filtro']) : null; 

    // $limite = isset($_POST['limite']) ? (empty($_POST['limite']) ? $pagina->getNumberOfRegisters(new Conexion, $filtro) : $_POST['limite']) : $pagina->getNumberOfRegisters(new Conexion, $filtro); 
    $limite = isset($_POST['limite']) ? (empty($_POST['limite']) ? 5 : $_POST['limite']) : 5; 

    $resetPage = !isset($filtro) ? false : (isset($resetPage) ? false : true); 
    require_once __DIR__ . '/' . './cpaginacion.php';
    //obtengo el total de paginas para mostrar los registros

    $totalPages = totalPages($plan, $limite, $filtro);
    //calcular el offset
    $offSet = offSet($limite, $page); 
    $listadoRegistros = listarRegistros(new Conexion, $plan, $limite, $filtro, $offSet);

}
else{
    $listadoRegistros = listarEshop(new Conexion, $plan);
}


//preguntamos si carrito esta seteado .. si no enrtonces vale 0.
if(isset($_POST['controller']))
{
    if($_POST['controller'] == 'carrito')
    {
        session_start();
        $_SESSION['carrito']['id_plan'] = $_POST['id_plan'];
        $_SESSION['carrito']['nom_plan'] = $_POST['nom_plan'];
        $_SESSION['carrito']['valor_plan'] = $_POST['valor_plan'];
        $_SESSION['carrito']['dias_vigencia'] = $_POST['dias_vigencia'];
        // header('location: ../home.php?pg=10');

    }
  

}

$carrito = isset($_SESSION['carrito']) ? 1 : 0;

// var_dump(listarRegistros(new Conexion, $plan, $limite, 'test', $offSet));
?>