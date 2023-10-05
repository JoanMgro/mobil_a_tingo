<?php
require_once __DIR__ . '/' . '../../models/Conexion.php';
require_once __DIR__ . '/' . '../inputs/InputView.php';

require_once __DIR__ . '/' . '../../controllers/SearchController.php';
require_once __DIR__ . '/' . '../SearchView.php';

$conn = new Conexion();
$inputView = new InputView(new InputModel($conn));



// require __DIR__ . '/' . '../index.php';
//Declarando variables de busqueda e inicializandolas con lo que hay en GET.
$pais = isset($_GET["pais"]) ? $_GET["pais"] : NULL;
$dept = isset($_GET["departamento"]) ? $_GET["departamento"] : NULL;
$ciudad = isset($_GET["ciudad"]) ? $_GET["ciudad"] : NULL;
$barrio = isset($_GET["barrio"]) ? $_GET["barrio"] : NULL;
$radio = isset($_GET["radio"]) ? $_GET["radio"] : NULL;
$myCoords = isset($_GET["my_coords"]) ? $_GET["my_coords"] : NULL;

if($myCoords){
    $searchModel = new SearchModel($conn);
    $searchController = new SearchController($searchModel, $pais, $dept,
                                            $ciudad, $barrio, $radio, json_decode($myCoords));
    $searchView = new SearchView($searchModel);
    

}

?>