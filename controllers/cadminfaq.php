<?php
require_once __DIR__ . '/' . '../models/classes/Conexion.php';
require_once __DIR__ . '/' . '../models/classes/Faq.php';
require_once __DIR__ . '/' . './cpaginacion.php';


function listarRegistros(Conexion $conn, Faq $model, $limite, $filtro, $offSet)
{   
    
    return $model->listar($conn, $limite, $filtro, $offSet);

}

function activarRegistro(Conexion $conn, Faq $model, $idRegistro, $activarRegistro)
{
    if(isset($idRegistro) && isset($activarRegistro))
    $model->activar($conn, $idRegistro, $activarRegistro);
}

function actualizarRegistro(Conexion $conn, Faq $modelo, $id, $question, $answer)
{
    $modelo->actualizar($conn, $id, $question, $answer);
}
function eliminarRegistro(Conexion $conn, Faq $modelo, $id)
{
    $modelo->eliminar($conn, $id);
}
function crearRegistro(Conexion $conn, Faq $modelo, $question, $answer, $activo)
{
    $modelo->crear($conn, $question, $answer, $activo);
    
}



//Creo la instancia
$faq = new Faq();

//llamamos la funcion correspondiente
if($_POST['controller'] == 'activar')
{
    activarRegistro(new Conexion, $faq, $_POST['id_faq'], $_POST['activo']);
}   
if($_POST['controller'] == 'actualizar')
{
    actualizarRegistro(new Conexion, $faq, $_POST['id_faq'], $_POST['question'], $_POST['answer']);
}

if($_POST['controller'] == 'eliminar')
{
    if(isset($_POST['id_faq']))
    {
        
        eliminarRegistro(new Conexion, $faq, $_POST['id_faq']);
    }
    
}
if($_POST['controller'] == 'crear')
{
    if(isset($_POST['question'], $_POST['answer']))
    {
    
        
            $mostrar = isset($_POST['activo']) ? isset($_POST['activo']) : 1;
            crearRegistro(new Conexion, $faq, $_POST['question'], $_POST['answer'], $mostrar);
              

    }
    
}


// crearRegistro(new Conexion, $faq, 'atingo test', 'plan test de mpobilatingo', 2450000, 30, 1);
// actualizarRegistro(new Conexion, $faq, 6, 'plan actualizado', 'dec actualizada', 150000, 15);
// eliminarRegistro(new Conexion, $faq, 6);

$filtro = isset($_POST['filtro']) ? (empty($_POST['filtro']) ? null : $_POST['filtro']) : null; 

// $limite = isset($_POST['limite']) ? (empty($_POST['limite']) ? $pagina->getNumberOfRegisters(new Conexion, $filtro) : $_POST['limite']) : $pagina->getNumberOfRegisters(new Conexion, $filtro); 
$limite = isset($_POST['limite']) ? (empty($_POST['limite']) ? 5 : $_POST['limite']) : 5; 


//obtengo el total de paginas para mostrar los registros

$totalPages = totalPages($faq, $limite, $filtro);
//calcular el offset
$offSet = offSet($limite, $page); 
$listadoRegistros = listarRegistros(new Conexion, $faq, $limite, $filtro, $offSet);

// var_dump(listarRegistros(new Conexion, $faq, $limite, 'test', $offSet));
?>