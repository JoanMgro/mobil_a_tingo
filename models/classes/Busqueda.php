<?php

class Busqueda {

    private $empresas;  


    public function setEmpresas(Conexion $conn, Ubicacion $ubicacion)
    {   
        $dbh = $conn->get_conexion();
        $sql = "SELECT e.nom_empresa, ub.direccion FROM Empresas e";
        $sql .= " INNER JOIN UbicacionEmpresas ub ON e.ubicacion = ub.id_ubicacion";
        $sql .= " INNER JOIN Suscripciones sus ON e.id_empresa = sus.empresa";
        $sql .= " WHERE sus.estado_suscripcion = 1 AND ub.pais = :pais AND ub.departamento LIKE (ifnull(:depto,'%'))";
        $sql .= " AND ub.ciudad LIKE (ifnull(:city,'%'))";
        $sql .= " AND ub.barrio LIKE (ifnull(:barrio,'%'));";        
        // $sql = "call get_empresas(:pais, :depto, :city, :barrio)";
        $stmt = $dbh->prepare($sql);
        $stmt->bindValue(':pais', $ubicacion->getPais());
        $stmt->bindValue(':depto', $ubicacion->getDepto());
        $stmt->bindValue(':city', $ubicacion->getCiudad());
        $stmt->bindValue(':barrio', $ubicacion->getBarrio());
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
        $sql .= " INNER JOIN Suscripciones sus ON e.id_empresa = sus.empresa";
        $sql .= " WHERE sus.estado_suscripcion = 1 AND ub.latitud BETWEEN :lat1 AND :lat2";
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