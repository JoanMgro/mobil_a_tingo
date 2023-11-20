<?php
class PlanesMobilatingo{
    private $idPlan;
    private $nomPlan;
    private $descPlan;
    private $valorPlan;
    public $currentRows;
    
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

    public function getNumberOfRegisters(Conexion $conn, $filtro)
    {
        $dbh = $conn->get_conexion();
        $filtros = " WHERE id_plan LIKE :idPlan OR nom_plan LIKE :nomPlan OR desc_plan LIKE :descPlan OR valor_plan LIKE :valorPlan OR dias_vigencia LIKE :diasVigencia";
        $filtro = isset($filtro) ? (empty($filtro) ? '%' : ('%' . $filtro . '%')) : '%';
        $sql = "SELECT COUNT(id_plan) FROM Planes_Mobilatingo" . $filtros;
        $stmt = $dbh->prepare($sql);
        $stmt->bindValue(':idPlan', $filtro);
        $stmt->bindValue(':nomPlan', $filtro);
        $stmt->bindValue(':descPlan', $filtro);
        $stmt->bindValue(':valorPlan', $filtro);
        $stmt->bindValue(':diasVigencia', $filtro);
        $stmt->execute();
        $this->currentRows = $stmt->fetchColumn();
        $dbh = null;
        $stmt = null;
        return $this->currentRows;
    }

    public function listar(Conexion $conn, $limite = null, $filtro  = null, $offset = null)
    {

        $dbh = $conn->get_conexion();
        // $sql = "SELECT COUNT(id_cuenta) FROM Cuentas";
        // $stmt = $dbh->prepare($sql);
        // $stmt->execute();
        // $currentRows = $stmt->fetchColumn();
        // $totalPag = ceil($currentRows);


        // Si hay limite             
        if(isset($limite))
        {
            $dbh->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
            $filtros = " WHERE id_plan LIKE :idPlan OR nom_plan LIKE :nomPlan OR desc_plan LIKE :descPlan OR valor_plan LIKE :valorPlan OR dias_vigencia LIKE :diasVigencia ORDER BY id_plan LIMIT :offset, :limite";
            $filtro = isset($filtro) ? (empty($filtro) ? '%' : ('%' . $filtro . '%')) : '%';
            $sql = "SELECT * FROM Planes_Mobilatingo" . $filtros;
            $stmt = $dbh->prepare($sql);
           
            $stmt->bindValue(':idPlan', $filtro);
            $stmt->bindValue(':nomPlan', $filtro);
            $stmt->bindValue(':descPlan', $filtro);
            $stmt->bindValue(':valorPlan', $filtro);
            $stmt->bindValue(':diasVigencia', $filtro);
            $stmt->bindValue(':limite', $limite);
            $stmt->bindValue(':offset', $offset);

            $stmt->execute();
            $planes = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $dbh = null;
            $stmt = null;
        }

        else
        {
            $filtros = " WHERE id_plan LIKE :idPlan OR nom_plan LIKE :nomPlan OR desc_plan LIKE :descPlan OR valor_plan LIKE :valorPlan OR dias_vigencia LIKE :diasVigencia ORDER BY id_plan";
            $filtro = isset($filtro) ? (empty($filtro) ? '%' : ('%' . $filtro . '%')) : '%';
            $sql = "SELECT * FROM Planes_Mobilatingo" . $filtros;
            $stmt = $dbh->prepare($sql);
            $stmt->bindValue(':idPlan', $filtro);
            $stmt->bindValue(':nomPlan', $filtro);
            $stmt->bindValue(':descPlan', $filtro);
            $stmt->bindValue(':valorPlan', $filtro);
            $stmt->bindValue(':diasVigencia', $filtro);
            $stmt->execute();
            $planes = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $dbh = null;
            $stmt = null;
        }

        return $planes;

    }

    public function crear(Conexion $conn, $nombre, $descripcion, $valor, $vigencia, $activo)
    {
        $dbh = $conn->get_conexion();
        
        $sql = "INSERT INTO Planes_Mobilatingo (nom_plan, desc_plan, valor_plan, dias_vigencia, activo) ";
        $sql .= "VALUES (:nomPlan, :descPlan, :valorPlan, :diasVigencia, :activo)";
        $stmt = $dbh->prepare($sql);
       
        $stmt->bindValue(':nomPlan', $nombre);
        $stmt->bindValue(':descPlan', $descripcion);
        $stmt->bindValue(':valorPlan', $valor);
        $stmt->bindValue(':diasVigencia', $vigencia);
        $stmt->bindValue(':activo', $activo);
        $stmt->execute();
        $dbh = null;
        $stmt = null;
    }

    public function eliminar(Conexion $conn, $id)
    {
        $dbh = $conn->get_conexion();
        $sql = "DELETE FROM Planes_Mobilatingo WHERE id_plan = :idPlan";
        $stmt = $dbh->prepare($sql);
        $stmt->bindValue(':idPlan', $id);
        $stmt->execute();
        $dbh = null;
        $stmt = null;
    }

    public function actualizar(Conexion $conn, $id, $nombre, $descripcion, $valor, $vigencia)
    {
        $dbh = $conn->get_conexion();
        
        $sql = "UPDATE Planes_Mobilatingo SET nom_plan = :nomPlan, desc_plan = :descPlan, ";
        $sql .= "valor_plan = :valorPlan, dias_vigencia = :diasVigencia WHERE id_plan = :idPlan";
        $stmt = $dbh->prepare($sql);
        $stmt->bindValue(':idPlan', $id);
        $stmt->bindValue(':nomPlan', $nombre);
        $stmt->bindValue(':descPlan', $descripcion);
        $stmt->bindValue(':valorPlan', $valor);
        $stmt->bindValue(':diasVigencia', $vigencia);
        $stmt->execute();
        $dbh = null;
        $stmt = null;
    }

    public function activar(Conexion $conn, $idPlan, $activo)
    {
        $dbh = $conn->get_conexion();
        
        $sql = "UPDATE Planes_Mobilatingo SET activo = :activo WHERE id_plan = :idPlan";
        $stmt = $dbh->prepare($sql);
        $stmt->bindValue(':idPlan', $idPlan);
        $stmt->bindValue(':activo', $activo);
        $stmt->execute();
        $dbh = null;
        $stmt = null;
    }


    
}
?>