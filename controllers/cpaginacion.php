<?php

$page = isset($_GET['page']) ? (empty($_GET['page']) ? 1 : $_GET['page']) : 1;
function totalPages($model, $limite, $filtro)
{   
   
    return ceil($model->getNumberOfRegisters(new Conexion, $filtro)/$limite);
    

} 

function offSet($limite, $page)
{
    return ($page - 1) * $limite;
    
}



?>