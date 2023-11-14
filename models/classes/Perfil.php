<?php
class Perfil
{
    private ?int $pefid;
    private ?string $pefnom;
    private $activo;

    public function __construct(?int $pefId = null, ?string $pefNom = null)
    {
        $this->pefid = $pefId;
        $this->pefnom = $pefNom;        
    }

    

    public function listar(Conexion $conn)
    {
        $dbh = $conn->get_conexion();

        $sql = "SELECT * FROM Perfil";
        $stmt = $dbh->prepare($sql);
        $stmt->execute();
        $perfiles = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $dbh = null;
        $stmt = null;
    
        return $perfiles;

    }
    public function borrarPagPer(Conexion $conn, $pefid, $pagid)
    {
        $dbh = $conn->get_conexion();
        $sql = "DELETE FROM Pagper WHERE pagid = :pagid AND pefid = :pefid";
        $stmt = $dbh->prepare($sql);
        $stmt->bindValue(':pagid', $pagid);
        $stmt->bindValue(':pefid', $pefid);
        $stmt->execute();
        $dbh = null;
        $stmt = null;
    }
    public function agregarPagPer(Conexion $conn, $pefid, $pagid)
    {
        $dbh = $conn->get_conexion();
        
        $sql = "INSERT INTO Pagper (pagid, pefid) ";
        $sql .= "VALUES (:pagid, :pefid)";
        $stmt = $dbh->prepare($sql);
        $stmt->bindValue(':pagid', $pagid);
        $stmt->bindValue(':pefid', $pefid);
        $stmt->execute();
        $dbh = null;
        $stmt = null;
    }

    public function listarPagPer(Conexion $conn, $pefid, $pagmen)
    {
        $dbh = $conn->get_conexion();
        $sql = "SELECT pagid, pagnom FROM Pagina WHERE pagmen = :pagmen";
        $stmt = $dbh->prepare($sql);
        $stmt->bindValue(':pagmen', $pagmen);
        $stmt->execute();
        $paginas = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $sql = "SELECT pagid, pefid FROM Pagper ";
        $sql .= "WHERE pefid = :pefid";
        $stmt = $dbh->prepare($sql);
        $stmt->bindValue(':pefid', $pefid);
        $stmt->execute();
        $pagpers = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $dbh = null;
        $stmt = null;
        
        $returnPaginas = [];
        foreach($paginas as $pagina)
        {
            foreach($pagpers as $pagper)
            {
                if($pagina['pagid'] == $pagper['pagid'])
                {
                    
                    $pagina['pefid'] = $pagper['pefid'];
                    
                }
                
                   
            }
            $pagina['perfil'] = $pefid;
            $returnPaginas[] = $pagina; 
        }
           
        return $returnPaginas;


    }
}
?>