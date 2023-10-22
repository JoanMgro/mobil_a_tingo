<?php

class Pagina
{
    protected $pagid;
    protected $pagnom;
    protected $pagarc;
    protected $pagord;
    protected $pagmen;

    protected Array $paginas; 

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


}

// $model = new Pagina();
// $model->setPaginas(new Conexion, 'index');

// var_dump($model->getPaginas());

?>