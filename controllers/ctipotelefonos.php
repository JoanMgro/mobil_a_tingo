<?php
require_once __DIR__ . '/' . '../models/classes/Conexion.php';
require_once __DIR__ . '/' . '../models/classes/TipoTelelefonos.php';

function loadTipoTelefonosInModel(Conexion $conn, TipoTelefonos $tipTelModel)
{   
    
    $tipTelModel->setTipoTelefonos($conn);

}

$tipTelModel = new TipoTelefonos();
loadTipoTelefonosInModel(new Conexion, $tipTelModel);


?>