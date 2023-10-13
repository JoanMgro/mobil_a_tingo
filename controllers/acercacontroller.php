<?php

function loadModel(Conexion $conn, Acerca $model)
{
    $model->readTextoAcerca($conn);

}


?>