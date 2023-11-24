<?php
require_once __DIR__ . '/' . '../models/classes/Conexion.php';
require_once __DIR__ . '/' . '../models/classes/Acerca.php';


function listarAcerca(Conexion $conn, Acerca $model)
{
    return $model->listar($conn);
}

function actualizarAcerca(Conexion $conn, Acerca $model)
{
  
  $model->actualizar($conn);

}




 if(isset($_POST['controller']))
   {
    if($_POST['controller'] == 'actualizar')
    {
          
      
      $acerca = new Acerca($_POST['id_acerca'], $_POST['texto_acerca']);
      actualizarAcerca(new Conexion, $acerca);
      echo "<script type='text/javascript'>window.location='../home.php?pg=10'</script>";
          
    }
   
   }
$listaRegistros = listarAcerca(new Conexion, new Acerca());




?>