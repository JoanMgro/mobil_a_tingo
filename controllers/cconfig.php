<?php
require_once __DIR__ . '/' . '../models/classes/Conexion.php';
require_once __DIR__ . '/' . '../models/classes/Configuracion.php';


function listarConfig(Conexion $conn, Configuracion $model)
{
    return $model->listar($conn);
}

function actualizarConfig(Conexion $conn, Configuracion $model)
{
  
  $model->actualizar($conn);

}

function crearConfig(Conexion $conn, Configuracion $model)
{
  
  $model->crear($conn);

}




 if(isset($_POST['controller']))
   {
    if($_POST['controller'] == 'actualizarConfig')
    {
        $mosdir = isset($_POST['mosdir']) ? $_POST['mosdir'] : 0;
        $mostel = isset($_POST['mostel']) ? $_POST['mostel'] : 0;
        $moscel = isset($_POST['moscel']) ? $_POST['moscel'] : 0;
        $mosema = isset($_POST['mosema']) ? $_POST['mosema'] : 0;
        $mosface = isset($_POST['mosface']) ? $_POST['mosface'] : 0;
        $mosinst = isset($_POST['mosinst']) ? $_POST['mosinst'] : 0;
        $moswass = isset($_POST['moswass']) ? $_POST['moswass'] : 0;
        $mosx = isset($_POST['mosx']) ? $_POST['mosx'] : 0;
        
        $config = new Configuracion($_POST['idconfig'], $_POST['nit'], $_POST['nomemp'], $_POST['dircon'],
                                  $mosdir, $_POST['telcon'], $mostel, $_POST['celcon'],
                                  $moscel, $_POST['emacon'], $mosema, $mosface,
                                  $mosinst, $moswass, $mosx);
      actualizarConfig(new Conexion, $config);
      echo "<script type='text/javascript'>window.location='../home.php?pg=10'</script>";
          
    }

    if($_POST['controller'] == 'crearConfig')
    {
          
        $mosdir = isset($_POST['mosdir']) ? $_POST['mosdir'] : 0;
        $mostel = isset($_POST['mostel']) ? $_POST['mostel'] : 0;
        $moscel = isset($_POST['moscel']) ? $_POST['moscel'] : 0;
        $mosema = isset($_POST['mosema']) ? $_POST['mosema'] : 0;
        $mosface = isset($_POST['mosface']) ? $_POST['mosface'] : 0;
        $mosinst = isset($_POST['mosinst']) ? $_POST['mosinst'] : 0;
        $moswass = isset($_POST['moswass']) ? $_POST['moswass'] : 0;
        $mosx = isset($_POST['mosx']) ? $_POST['mosx'] : 0;
      
      $config = new Configuracion(1, $_POST['nit'], $_POST['nomemp'], $_POST['dircon'],
                                $mosdir, $_POST['telcon'], $mostel, $_POST['celcon'],
                                $moscel, $_POST['emacon'], $mosema, $mosface,
                                $mosinst, $moswass, $mosx);
      crearConfig(new Conexion, $config);
      echo "<script type='text/javascript'>window.location='../home.php?pg=10'</script>";
          
    }
   
   }

// $con = new Configuracion(1,'1','1','1',1,'1',1,'1',1,'1',1,1,1,1,1);
// actualizarConfig(new Conexion, $con);

$listaRegistros = listarConfig(new Conexion, new Configuracion);

?>