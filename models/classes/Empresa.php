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

    public function setEmpresasGps(Conexion $conn, BoundingBox $box)
    {   
        
        $dbh = $conn->get_conexion();        
        $sql = "SELECT e.nom_empresa, ub.direccion FROM Empresas e";
        $sql .= " INNER JOIN UbicacionEmpresas ub ON e.ubicacion = ub.id_ubicacion";
        $sql .= " WHERE ub.latitud BETWEEN :lat1 AND :lat2";
        $sql .= " AND ub.longitud BETWEEN :long1 AND :long2;";
        $stmt = $dbh->prepare($sql);
        $stmt->bindValue(':lat1', $box->getlatitudRange()[0]);
        $stmt->bindValue(':lat2', $box->getlatitudRange()[1]);
        $stmt->bindValue(':long1', $box->getlongitudRange()[0]);
        $stmt->bindValue(':long2', $box->getlongitudRange()[1]);
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