<?php
session_start();
$auth = isset($_SESSION['validated']) ? $_SESSION['validated'] : NULL;

if($auth != '@1r;:**3')
{
    session_destroy();
    header('location: ../index.php');
    exit();
}

require_once __DIR__ . '/' . '../models/classes/Conexion.php';
require_once __DIR__ . '/' . '../models/classes/Pagper.php';

$pagPer = new Pagper($_GET['pg'], $_SESSION['pefid']);
if(!$pagPer->listarPagper(new Conexion))
{
    echo "<script type='text/javascript'>window.location='../home.php?pg=10'</script>";
}

?>