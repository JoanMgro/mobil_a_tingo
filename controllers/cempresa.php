<?php
require_once __DIR__ . '/' . '../models/classes/Conexion.php';
require_once __DIR__ . '/' . '../models/classes/Cuenta.php';
require_once __DIR__ . '/' . '../models/classes/Ubicacion.php';
require_once __DIR__ . '/' . '../models/classes/Telefono.php';
require_once __DIR__ . '/' . '../models/classes/Empresa.php';


$pais = isset($_POST['pais']) ? $_POST['pais'] : null;
$departamento = isset($_POST['departamento']) ? $_POST['departamento'] : null;
$ciudad = isset($_POST['ciudad']) ? $_POST['ciudad'] : null;
$barrio = isset($_POST['barrio']) ? $_POST['barrio'] : null;
$direccion = isset($_POST['direccion']) ? $_POST['direccion'] : null;
$latitud = isset($_POST['latitud']) ? $_POST['latitud'] : null;
$longitud = isset($_POST['longitud']) ? $_POST['longitud'] : null;

$idEmpresa = isset($_POST['email']) ? $_POST['email'] : null;
$password = isset($_POST['pass']) ? $_POST['pass'] : null;
$nombre = isset($_POST['nombre']) ? $_POST['nombre'] : null;
$nit = isset($_POST['nit']) ? $_POST['nit'] : null;
$logo = isset($_POST['logo']) ? $_POST['logo'] : null;

$telefonosJson = isset($_POST['telefonos']) ? $_POST['telefonos'] : null;
// $numtel = '{"0":{"Fijo":"4545"},"1":{"Celular":"4545"},"2":{"Celular":"45454"}}';

$telefonos = [];
foreach(json_decode($telefonosJson) as $index => $value)
{
    foreach($value as $tipo => $numero)
    {
        $telefonos[$index][$tipo] = $numero;
    }
    
}

$ubicacion = new Ubicacion($pais, $departamento, $ciudad, $barrio, $direccion,
                             $latitud, $longitud);
$nuTelefonos =  new Telefono($telefonos);
$nuevaEmpresa = new Empresa($idEmpresa, $password, $nombre, $nit, $logo);
$nuevaEmpresa->crearEmpresa(new Conexion, $ubicacion, $nuTelefonos);

echo "<script type='application/javascript'>window.location='../home.php?pg=10'</script>";


?>