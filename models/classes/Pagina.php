<?php
//
class Pagina
{
    protected $pagid;
    protected $pagnom;
    protected $pagarc;
    protected $pagord;
    protected $pagmen;

    protected Array $paginas; 
    private $currentRows;

    public function __construct($pagid = null, $pagnom = null, $pagarc = null, $pagord = null,
                                $pagmen = null)
    {
        $this->pagid = $pagid;
        $this->pagnom = $pagnom;
        $this->pagarc = $pagarc;
        $this->pagord = $pagord;
        $this->pagmen = $pagmen;                
    }

    public function setPagid($pagid)
    {
        $this->pagid = $pagid;
    }
    public function setPagnom($pagnom)
    {
        $this->pagnom = $pagnom;
    }
    public function setPagarc($pagarc)
    {
        $this->pagarc = $pagarc;
    }
    public function setPagord($pagord)
    {
        $this->pagord = $pagord;
    }
    public function setPagmen($pagmen)
    {
        $this->pagmen = $pagmen;
    }

    public function getPagid()
    {
       return $this->pagid;
    }
    public function getPagnom()
    {
       return $this->pagnom;
    }
    public function getPagarc()
    {
       return $this->pagarc;
    }
    public function getPagord()
    {
       return $this->pagord;
    }
    public function getPagmen()
    {
       return $this->pagmen;
    }

    public function setPaginas(Conexion $conn, $pagmen)
    {
        $dbh = $conn->get_conexion();
        $sql = "SELECT * FROM Pagina WHERE pagmen = :pagmen AND pagmos = 1 ORDER BY pagord";
        $stmt = $dbh->prepare($sql);
        $stmt->bindValue(':pagmen', $pagmen);
        $stmt->execute();
        $this->paginas = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $dbh = null;
        $stmt = null;  

    }

    public function getPaginas()
    {
        return $this->paginas;
    }

    public function listarPaginas(Conexion $conn, $limite = null, $filtro)
    {
        $dbh = $conn->get_conexion();
        $sql = "SELECT COUNT(pagid) FROM Pagina";
        $stmt = $dbh->prepare($sql);
        $stmt->execute();
        $this->currentRows = $stmt->fetchColumn();
        $totalPag = ceil($this->currentRows);


        // Si hay limite             
        if(isset($limite))
        {
            $dbh->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
            $filtros = " WHERE pagid LIKE :pagid OR pagnom LIKE :pagnom OR pagmen LIKE :pagmen ORDER BY pagid LIMIT :limite";
            $filtro = isset($filtro) ? (empty($filtro) ? '%' : ('%' . $filtro . '%')) : '%';
            $sql = "SELECT * FROM Pagina" . $filtros;
            $stmt = $dbh->prepare($sql);
           
            $stmt->bindValue(':pagid', $filtro);
            $stmt->bindValue(':pagnom', $filtro);
            $stmt->bindValue(':pagmen', $filtro);
            $stmt->bindValue(':limite', $limite);

            $stmt->execute();
            $this->paginas = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $dbh = null;
            $stmt = null;
        }

        else
        {
            $filtros = " WHERE pagid LIKE :pagid OR pagnom LIKE :pagnom OR pagmen LIKE :pagmen ORDER BY pagid";
            $filtro = isset($filtro) ? (empty($filtro) ? '%' : ('%' . $filtro . '%')) : '%';
            $sql = "SELECT * FROM Pagina" . $filtros;
            $stmt = $dbh->prepare($sql);
            $stmt->bindValue(':pagid', $filtro);
            $stmt->bindValue(':pagnom', $filtro);
            $stmt->bindValue(':pagmen', $filtro);
            $stmt->execute();
            $this->paginas = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $dbh = null;
            $stmt = null;
        }

        return $this->paginas;
    }

    public function updatePaginas(Conexion $conn, $idPagina, $pagMos)
    {
        $dbh = $conn->get_conexion();
        
        $sql = "UPDATE Pagina SET pagmos = :pagMos WHERE pagid = :idPagina";
        $stmt = $dbh->prepare($sql);
        $stmt->bindValue(':idPagina', $idPagina);
        $stmt->bindValue(':pagMos', $pagMos);
        $stmt->execute();
        $dbh = null;
        $stmt = null;
    }



}
// require_once __DIR__ . '/' . './Conexion.php';
// $model = new Pagina();
// $model->listarPaginas(new Conexion, 2, '');

// var_dump($model->getPaginas());

?>