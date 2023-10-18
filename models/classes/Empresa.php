<?php

require_once __DIR__ . '/Cuenta.php';
require_once __DIR__ . '/Ubicacion.php';

class Empresa extends Cuenta{
    private $idEmpresa;
    private $nit;
    private $nombre;
    private $urlLogo;
    private Ubicacion $ubicacion;
    
    private $empresas;
    
    // private BoundingBox $boundingBox;
    

   


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

    public function setEmpresas(Conexion $conn, Ubicacion $ubicacion)
    {   
        $this->ubicacion = $ubicacion;
        $dbh = $conn->get_conexion();        
        $sql = "call get_empresas(:pais, :depto, :city, :barrio)";
        $stmt = $dbh->prepare($sql);
        $stmt->bindValue(':pais', $this->ubicacion->getPais());
        $stmt->bindValue(':depto', $this->ubicacion->getDepto());
        $stmt->bindValue(':city', $this->ubicacion->getCiudad());
        $stmt->bindValue(':barrio', $this->ubicacion->getBarrio());
        $stmt->execute();
        $this->empresas = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $dbh = NULL;
        $stmt = NULL;        

    }

    public function getEmpresas()
    {
        return $this->empresas;
    }

}
?>