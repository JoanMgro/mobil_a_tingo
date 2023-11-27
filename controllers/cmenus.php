<?php
require_once __DIR__ . '/' . '../models/classes/Conexion.php';
require_once __DIR__ . '/' . '../models/classes/Pagina.php';
require_once __DIR__ . '/' . '../models/classes/Menu.php';


function loadMenus(Conexion $conn, Menu $model, $pagina, $pefid)
{   
    
    $model->setPaginas($conn, $pagina, $pefid);

}

$products = isset($_SESSION['carrito']) ? '1' : ''; 
// if(isset($_SESSION['carrito']))
// {
//     $products = strval(count($_SESSION['carrito']));
// }
// else
// {
//     $products = ''; 
// }

$mMenu = new Menu(); 
$mPattern = "/[\/\.\?]/";
$mData = isset($_SERVER['REQUEST_URI']) ? $_SERVER['REQUEST_URI'] : '/index.php';
$mPagina = preg_split($mPattern, $mData);
$mPefid = isset($_SESSION['pefid']) ? $_SESSION['pefid'] : 3;

loadMenus(new Conexion(), $mMenu, $mPagina[1], $mPefid);



?>