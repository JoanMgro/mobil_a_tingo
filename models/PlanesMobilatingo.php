<?php
class PlanesMobilatingo{
    private $idPlan;
    private $nomPlan;
    private $descPlan;
    private $valorPlan;
    private $conn;
    private Array $planes;

    public function __construct(Conexion $conn, $nomPlan = NULL , $descPlan = NULL, $valorPlan = NULL)
    {
        $this->nomPlan = $nomPlan;
        $this->descPlan = $descPlan;
        $this->valorPlan = $valorPlan;
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