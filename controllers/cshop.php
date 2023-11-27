<?php


//la sesion ya debe estar inicalizada
session_start();
if(isset($_POST['controller']) == 'carrito')
{
    $_SESSION['carrito']['id_plan'] = $_POST['id_plan'];
    $_SESSION['carrito']['nom_plan'] = $_POST['nom_plan'];
    $_SESSION['carrito']['valor_plan'] = $_POST['valor_plan'];
    $_SESSION['carrito']['dias_vigencia'] = $_POST['dias_vigencia'];

}


?>