<?php
require_once __DIR__ . '/Conexion.php';
require_once __DIR__ . '/Cuenta.php';
require_once __DIR__ . '/Ubicacion.php';

class Empresa extends Cuenta{
    private $idEmpresa;
    private $nit;
    private $nombre;
    private $urlLogo;
    private $conn;
    private $empresas;
    private Ubicacion $ubicacion;
    private BoundingBox $boundingBox;
    

    public function __construct(Conexion $conn, Ubicacion $ubicacion = NULL,
                                $id = NULL, $nit = NULL, $nombre = NULL, 
                                $url = NULL)
    {
        $this->idEmpresa = $id;
        $this->nit = $nit;
        $this->nombre = $nombre;
        $this->urlLogo = $url;
        $this->conn = $conn->get_conexion();
        $this->ubicacion = $ubicacion;
    }  


    public function crearCuenta()
    {
        /* */
    }
    public function listarCuenta()
    {
        /* */
    }
    public function listarCuentas()
    {
        /* */
    }

    public function setEmpresas()
    {   
        
        $sql = "call get_empresas(:pais, :depto, :city, :barrio)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(':pais', $this->ubicacion->getPais());
        $stmt->bindValue(':depto', $this->ubicacion->getDepto());
        $stmt->bindValue(':city', $this->ubicacion->getCiudad());
        $stmt->bindValue(':barrio', $this->ubicacion->getBarrio());
        $stmt->execute();
        $this->empresas = $stmt->fetchAll(PDO::FETCH_ASSOC);        

    }

    public function getEmpresas()
    {
        return $this->empresas;
    }

}
?>