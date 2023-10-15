<?php
session_start();

require_once __DIR__ . '/' . '../models/Conexion.php';
require_once __DIR__ . '/' . '../models/Cuenta.php';

acceder();

function acceder()
{
    $user= isset($_POST["email"])? $_POST["email"]:NULL;
    $pass= isset($_POST["password"])? $_POST["password"]:NULL;
    if($user && $pass)
    {
        $conn = new Conexion();
        $data = Cuenta::autenticar($conn, $user, $pass);
        if(isset($data))
        {
            foreach ($data as $key => $value)
            {
                $_SESSION[$key] = $value;
            }
            $_SESSION['validated'] = '@1r;:**3';
            
        } 
        echo "<script type='application/javascript'>window.location='../home.php'</script>";
         
        
    }
    else
    {
        
        //regresar a pagina login
        session_destroy();
    }
    

}




?>