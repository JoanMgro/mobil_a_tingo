<?php
session_start();

require_once __DIR__ . '/' . '../models/classes/Conexion.php';
require_once __DIR__ . '/' . '../models/classes/Cuenta.php';

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
            
            $perfil = $_SESSION['pefid'];
            $dataSesion = Cuenta::cargarSesion($conn, $perfil, $user);
            foreach ($dataSesion as $key => $value)
            {
                $_SESSION[$key] = $value;
            }
            echo "<script type='text/javascript'>window.location='../home.php?pg=10'</script>";
        }
        else
        {
            session_destroy();
            echo "<script type='text/javascript'>window.location='../index.php?pg=1005'</script>";
            
        }
    }
    else
    {
        
        //regresar a pagina login
        
        session_destroy();
        echo "<script type='application/javascript'>window.location='../index.php?pg=1005'</script>";
    }
    

}




?>