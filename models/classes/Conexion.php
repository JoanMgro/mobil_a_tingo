<?php 
    // Creamos nuestra CLASE
    class Conexion{
    // Creamos METODO
     
     public function get_conexion(){
        include ('../configuracion.php');
        try{
            $conexion = new PDO("mysql:host=$host;dbname=$db",$user,$pass);
            return $conexion;
        }catch (PDOException $e){
            die("Unable to connect: " . $e->getMessage());
        }        
        
    }
 }


?>

