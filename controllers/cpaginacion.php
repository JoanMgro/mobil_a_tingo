<?php


if($resetPage)
{
    $page = 1;
}
else
{
    $page = isset($_POST['page']) ? (empty($_POST['page']) ? 1 : $_POST['page']) : 1;

}
    


function totalPages($model, $limite, $filtro)
{   
   
    return ceil($model->getNumberOfRegisters(new Conexion, $filtro)/$limite);
    

} 

function offSet($limite, $page)
{
    return ($page - 1) * $limite;
    
}



?>