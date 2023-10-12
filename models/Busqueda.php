<?php
require_once __DIR__ . '/Conexion.php';

class Busqueda {

    private $conn;
    private $empresas;
    private $boundingBox;
    

    public function setEmpresas(Conexion $conn, $pais = null, $depto = null, $city = null, $barrio = null, $lat = null, $long = null)
    {   

        $this->conn= $conn->get_conexion();        
        $sql = "call get_empresas(:pais, :depto, :city, :barrio)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(':pais', $pais);
        $stmt->bindValue(':depto', $depto);
        $stmt->bindValue(':city', $city);
        $stmt->bindValue(':barrio', $barrio);
        $stmt->execute();
        $this->empresas = $stmt->fetchAll(PDO::FETCH_ASSOC);        

    }


    public function setByLocation(Conexion $conn, BoundingBox $box)
    {   

        $this->conn= $conn->get_conexion();        
        $sql = "call get_empresas(:pais, :depto, :city, :barrio)";
        $stmt = $this->conn->prepare($sql);
        // $stmt->bindValue(':pais', $pais);
         $stmt->execute();
        $this->empresas = $stmt->fetchAll(PDO::FETCH_ASSOC);        

    }

    public function getEmpresas()
    {
        return $this->empresas;
    }

 
}
?>