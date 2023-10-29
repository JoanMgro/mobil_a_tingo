<?php
require_once __DIR__ . '/' . '../models/classes/Conexion.php';
require_once __DIR__ . '/' . '../models/classes/Cuenta.php';
require_once __DIR__ . '/' . '../models/classes/Ubicacion.php';
require_once __DIR__ . '/' . '../models/classes/Telefono.php';
require_once __DIR__ . '/' . '../models/classes/Empresa.php';

$pais = isset($_POST['pais']) ? (empty($_POST['pais']) ? null : $_POST['pais']) : null;
$departamento = isset($_POST['departamento']) ? (empty($_POST['departamento']) ? null : $_POST['departamento']) : null;
$ciudad = isset($_POST['ciudad']) ? (empty($_POST['ciudad']) ? null : $_POST['ciudad']) : null;
$barrio = isset($_POST['barrio']) ? (empty($_POST['barrio']) ? null : $_POST['barrio']) : null;
$direccion = isset($_POST['direccion']) ? (empty($_POST['direccion']) ? null : $_POST['direccion']) : null;
$latitud = isset($_POST['latitud']) ? (empty($_POST['latitud']) ? null : $_POST['latitud']) : null;
$longitud = isset($_POST['longitud']) ? (empty($_POST['longitud']) ? null : $_POST['longitud']) : null;

$idEmpresa = isset($_POST['email']) ? (empty($_POST['email']) ? null : $_POST['email']) : null;
$password = isset($_POST['pass']) ? (empty($_POST['pass']) ? null : $_POST['pass']) : null;
$nombre = isset($_POST['nombre']) ? (empty($_POST['nombre']) ? null : $_POST['nombre']) : null;
$nit = isset($_POST['nit']) ? (empty($_POST['nit']) ? null : $_POST['nit']) : null;
$logo = isset($_POST['logo']) ? (empty($_POST['logo']) ? null : $_POST['logo']) : null;

$telefonosJson = isset($_POST['telefonos']) ? (empty($_POST['telefonos']) ? null : $_POST['telefonos']) : null;
//$numtel = '{"0":{"Fijo":"4545"},"1":{"Celular":"4545"},"2":{"Celular":"45454"}}';




if(isset($_POST['action']) && ($_POST['action'] == 'crearEmpresa'))
{
    if(isset($pais, $departamento, $ciudad, $barrio, $direccion, $latitud, $longitud,
        $idEmpresa, $password, $nombre, $nit, $telefonosJson))
    {
        //Se decodifica el Json de telefonos que viene del formulario.
        $telefonos = [];
        foreach(json_decode($telefonosJson) as $index => $value)
        {
            foreach($value as $tipo => $numero)
            {
                $telefonos[$index][$tipo] = $numero;
            }    
        }
        //Se crean las instancias de Ubicacion, cuenta, empresa y telefonos
        $ubicacion = new Ubicacion($pais, $departamento, $ciudad, $barrio, $direccion,
        $latitud, $longitud);
        $nuTelefonos =  new Telefono($telefonos);
        $nuevaEmpresa = new Empresa($idEmpresa, $password, $nombre, $nit, $logo);
        $nuevaEmpresa->crearEmpresa(new Conexion, $ubicacion, $nuTelefonos);
            
        
    
    }
    echo "<script type='application/javascript'>window.location='../index.php?pg=1005&newreg=true'</script>";  
   
}



?>