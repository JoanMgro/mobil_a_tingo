<?php
class PlanesMobilatingo{
    private $idPlan;
    private $nomPlan;
    private $descPlan;
    private $valorPlan;
    
    private Array $planes;

    // public function __construct(Conexion $conn, $nomPlan = NULL , $descPlan = NULL, $valorPlan = NULL)
    // {
    //     $this->nomPlan = $nomPlan;
    //     $this->descPlan = $descPlan;
    //     $this->valorPlan = $valorPlan;
    //     $this->conn = $conn;        
    // }


    public function setPlanes (Conexion $conn)
    {
        $dbh = $conn->get_conexion(); 
        $sql = "SELECT pm.id_plan, pm.nom_plan, pm.desc_plan, pm.valor_plan";
        $sql .= " FROM Planes_Mobilatingo pm;";
        // $sql = "call get_planes()";
        $stmt = $dbh->prepare($sql);
        $stmt->execute();
        $this->planes = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        $dbh = null;
        $stmt = null;
    } 

    public function getPlanes(){
        return $this->planes;
    }

    public function setId($id)
    {
        $this->idPlan = $id;
    }

    public function getId()
    {
        return $this->idPlan;
    }

    public function setNomPlan($nomPlan)
    {
        $this->nomPlan = $nomPlan;
    }

    public function getNomPlan()
    {
        return $this->nomPlan;
    }


    public function setDescPlan($descPlan)
    {
        $this->descPlan = $descPlan;
    }

    public function getDescPlan()
    {
        return $this->descPlan;
    }

    public function setValorPlan($valorPlan)
    {
        $this->valorPlan =$valorPlan;
    }

    public function getValorPlan()
    {
        return $this->valorPlan;
    }

    
}
?>