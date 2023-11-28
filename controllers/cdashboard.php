<?php
require_once __DIR__ . '/' . '../models/classes/Conexion.php';
require_once __DIR__ . '/' . '../models/classes/Cuenta.php';
require_once __DIR__ . '/' . '../models/classes/Empresa.php';
require_once __DIR__ . '/' . '../models/classes/Ubicacion.php';
require_once __DIR__ . '/' . '../models/classes/Suscripcion.php';
require_once __DIR__ . '/' . '../models/classes/Admin.php';
require_once __DIR__ . '/' . '../controllers/cpreparelogo.php'; 

function listarEmpresa(Conexion $conn, Empresa $model)
{
    return $model->listarDashboard($conn);
}

function actualizarEmpresa(Conexion $conn, Empresa $model, Ubicacion $ubicacion, $idUbi)
{
  $ubicacion->updateUbicacion($conn, $idUbi);
  $model->actualizar($conn);

}
function eliminarEmpresa(Conexion $conn, Empresa $model, $idUbicacion)
{
  $model->eliminar($conn, $idUbicacion);

}



if($_SESSION['pefid'] == 2)
{
 $listaRegistros = listarEmpresa(new Conexion, new Empresa($_SESSION['id_empresa']));

 if(isset($_POST['controller']))
   {
    if($_POST['controller'] == 'actualizar')
    {
      $ubicacion = new Ubicacion($_POST['pais'], $_POST['departamento'], $_POST['ciudad'], $_POST['barrio'], $_POST['direccion'], $_POST['latitud'], $_POST['longitud']);
      
      $logo = isset($_FILES['logo']) && $_FILES['logo']['size'] > 0 ? prepararLogo() : $_SESSION['url_logo'];

      $empresa = new Empresa($_SESSION['id_empresa'],null, null, null, $logo,  $_POST['contacto'], $_POST['servicios']);
      actualizarEmpresa(new Conexion, $empresa, $ubicacion, $_POST['id_ubicacion']);
      echo "<script type='text/javascript'>window.location='../home.php?pg=10'</script>";
          
    }
    if($_POST['controller'] == 'eliminar')
    {
      $empresa = new Empresa($_SESSION['id_empresa']);
      eliminarEmpresa(new Conexion, $empresa, $_POST['id_ubicacion']);
      echo "<script type='text/javascript'>alert('Cuenta ha sido eliminada')</script>";
      echo "<script type='text/javascript'>window.location='../index.php?pg=1000'</script>";
          
    }
   }
}



?>