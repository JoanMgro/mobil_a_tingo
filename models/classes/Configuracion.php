<?php
class Configuracion{

    private $idConfig;
    private $nit;
    private $nomEmp;
    private $dirCon;
    private $mosDir;
    private $telCon;
    private $mosTel;
    private $celCon;
    private $mosCel;
    private $emaCon;
    private $mosEma;
    private $mosFace;
    private $mosIns;
    private $mosX;
    private $mosWass;
    
    public function __construct($idConfig = null, $nit = null, $nomEmp = null, $dirCon = null,
                                $mosDir = null, $telCon = null, $mosTel = null, $celCon = null,
                                $mosCel = null, $emaCon = null, $mosEma = null, $mosFace = null,
                                $mosIns = null, $mosWass = null, $mosX = null)
    {
        $this->idConfig = $idConfig;
        $this->nit = $nit;
        $this->nomEmp = $nomEmp;
        $this->dirCon = $dirCon;
        $this->mosDir = $mosDir;
        $this->telCon = $telCon;
        $this->mosTel = $mosTel;
        $this->celCon = $celCon;
        $this->mosCel = $mosCel;
        $this->emaCon = $emaCon;
        $this->mosEma = $mosEma;
        $this->mosFace = $mosFace;
        $this->mosIns = $mosIns;
        $this->mosX = $mosX;
        $this->mosWass = $mosWass;      
        

    }
    public function listar(Conexion $conn)
    {

        $dbh = $conn->get_conexion();            
        $sql = "SELECT * FROM Configuracion ";
        $stmt = $dbh->prepare($sql);
        $stmt->execute();
        $config = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $dbh = null;
        $stmt = null;
        return $config;

    }



    public function actualizar(Conexion $conn)
    {
        $dbh = $conn->get_conexion();
        
        $sql = "UPDATE Configuracion SET nit = :nit, nomemp = :nomemp, dircon = :dircon, mosdir = :mosdir, ";
        $sql .="telcon = :telcon, mostel = :mostel, celcon = :celcon, moscel = :moscel, emacon = :emacon, ";
        $sql .="mosema = :mosema, mosface = :mosface, mosinst = :mosinst, moswass = :moswass, mosx = :mosx ";
        $sql .= "WHERE idconfig = :id";
        $stmt = $dbh->prepare($sql);
        $stmt->bindValue(':id', $this->idConfig);
        $stmt->bindValue(':nit', $this->nit);
        $stmt->bindValue(':nomemp', $this->nomEmp);
        $stmt->bindValue(':dircon', $this->dirCon);
        $stmt->bindValue(':mosdir', $this->mosDir);
        $stmt->bindValue(':telcon', $this->telCon);
        $stmt->bindValue(':mostel', $this->mosTel);
        $stmt->bindValue(':celcon', $this->celCon);
        $stmt->bindValue(':moscel', $this->mosCel);
        $stmt->bindValue(':emacon', $this->emaCon);
        $stmt->bindValue(':mosema', $this->mosEma);
        $stmt->bindValue(':mosface', $this->mosFace);
        $stmt->bindValue(':mosinst', $this->mosIns);
        $stmt->bindValue(':moswass', $this->mosWass);
        $stmt->bindValue(':mosx', $this->mosX);
        
        $stmt->execute();
        $dbh = null;
        $stmt = null;
    }

    public function crear(Conexion $conn)
    {
        $dbh = $conn->get_conexion();
        $sql = "INSERT INTO Configuracion (idconfig, nit, nomemp, dircon, mosdir, telcon, mostel, celcon, moscel, emacon, mosema, mosface, mosinst, moswass, mosx) ";
        $sql .= "VALUES (:id, :nit, :nomemp, :dircon, :mosdir, ";
        $sql .=":telcon, :mostel, :celcon, :moscel, :emacon, ";
        $sql .=":mosema, :mosface, :mosinst, :moswass, :mosx)";
        $stmt = $dbh->prepare($sql);
        $stmt->bindValue(':id', $this->idConfig);
        $stmt->bindValue(':nit', $this->nit);
        $stmt->bindValue(':nomemp', $this->nomEmp);
        $stmt->bindValue(':dircon', $this->dirCon);
        $stmt->bindValue(':mosdir', $this->mosDir);
        $stmt->bindValue(':telcon', $this->telCon);
        $stmt->bindValue(':mostel', $this->mosTel);
        $stmt->bindValue(':celcon', $this->celCon);
        $stmt->bindValue(':moscel', $this->mosCel);
        $stmt->bindValue(':emacon', $this->emaCon);
        $stmt->bindValue(':mosema', $this->mosEma);
        $stmt->bindValue(':mosface', $this->mosFace);
        $stmt->bindValue(':mosinst', $this->mosIns);
        $stmt->bindValue(':moswass', $this->mosWass);
        $stmt->bindValue(':mosx', $this->mosX);        
        $stmt->execute();
        $dbh = null;
        $stmt = null;
    }



}

// require_once __DIR__ . '/Conexion.php';
// $con = new Configuracion(1,'1','1','1',1,'1',1,'1',1,'1',1,1,1,1,1);
// var_dump($con->actualizar(new Conexion()));
?>