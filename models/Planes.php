<?php

/*
    Clase para hacer CRUDE de los planes,
    utilizo la clase PlanesMovilatingo que representa la tabla.
*/
class Planes{
    private Array $planes;
    private $plan;
    private $conn;

    public function __construct(Conexion $conn)
    {
        $this->conn = $conn;
        
    }
    

    public function setPlanes ()
    {
        $dbh = $this->conn->get_conexion(); 
        
        $sql = "call get_planes()";
        $stmt = $dbh->prepare($sql);
        $stmt->execute();
        $this->planes = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        $dbh = null;
        $stmt = null;
    } 

    public function getPlanes(){
        return $this->planes;
    }

}
?>